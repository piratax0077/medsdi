<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab" href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Ficha de atención básica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="atencion_kine-tab" data-toggle="tab" href="#atencion_kine" role="tab" aria-controls="atencion_kine" aria-selected="true">Ficha de atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="control-tab" data-toggle="tab" href="#control" role="tab" aria-controls="control" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="h_control-tab" data-toggle="tab" href="#h_control" role="tab" aria-controls="h_control" aria-selected="false">Histórico controles</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="kine-contenido">
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
                                        <div class="card-header" id="mot-consulta">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                              Info.
                                            </button>
                                        </div>
                                        <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Tipo de consulta</label>
                                                            <select class="form-control form-control-sm" name="tipo_consulta" id="tipo_consulta">
                                                                <option value="AL">Espontanea</option>
                                                                <option value="LA">Derivada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-sm">Derivado por:</label>
                                                            <input type="text" class="form-control form-control-sm" name="deriv_por" id="deriv_por">
                                                        </div>
                                                        <div class="form-group col-md-3">

                                                        </div>
                                                        <div class="form-group col-md-3">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Motivo de la consulta</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                           <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Motivo de Consulta</label>
                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <div class="form-group fill">
                                                            <label id="" name="" class="floating-label-activo-sm">Tipo de consulta</label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option value="AL">Espontanea</option>
                                                                <option value="LA">Derivada</option>
                                                            </select>
                                                        </div>
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
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info align-middle">
                                            <h6 class="float-left d-inline">Antecedentes Familiares de la Especialidad</h6>
                                            <i id="ant_fam_fono" class="float-right f-18 d-inline fas fa-angle-down mb-0" style="cursor:pointer;"></i>
                                        </div>

                                        <div class="card-body shadow-none" id="ant_fono" style="display:none;">
                                            <form>
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
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!--Diagnóstico-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Diagnóstico y Plan de Tratamiento</h6>
                                        </div>
                                        <div class="card-body shadow-none">
                                            <form>
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

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Medicamentos o Examen-->

                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="interkine();"><i class="fa fa-plus"></i> Indicar Interconsulta</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="examenes_kine();"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informekine();"><i class="fa fa-plus"></i> Enviar Informe</button>
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
                <div class="tab-pane fade " id="atencion_kine" role="tabpanel" aria-labelledby="atencion_kine-tab">
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
                                <!--Antecedentes Familiares-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="antec_fam">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_fam_c" aria-expanded="false" aria-controls="antec_fam_c">
                                                Antecedentes Patológicos Propios y Familiares de la Especialidad
                                            </button>
                                        </div>
                                        <div id="antec_fam_c" class="collapse" aria-labelledby="antec_fam" data-parent="#antec_fam">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <h9>ANTECEDENTES FAMILIARES</h9>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar  Patologias Paternas</label>
                                                                <select class="form-control form-control-sm" name="select_1" id="select_1" multiple="multiple">
                                                                    <option value="HP">Hipertensión</option>
                                                                    <option value="DI">Diabetes</option>
                                                                    <option value="HC">Hipercolesterolemia</option>
                                                                    <option value="HL">Hiperlipidemia</option>
                                                                    <option value="CA">Cancer</option>
                                                                    <option value="CA">Obesidad</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar Patologias Maternas</label>
                                                                <select class="form-control form-control-sm" name="select_2" id="select_2" multiple="multiple">
                                                                    <option value="HP">Hipertensión</option>
                                                                    <option value="DI">Diabetes</option>
                                                                    <option value="HC">Hipercolesterolemia</option>
                                                                    <option value="HL">Hiperlipidemia</option>
                                                                    <option value="CA">Cancer</option>
                                                                    <option value="CA">Obesidad</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar Patologias Familiares</label>
                                                                <select class="form-control form-control-sm" name="select_3" id="select_3" multiple="multiple">
                                                                    <option value="HP">Hipertensión</option>
                                                                    <option value="DI">Diabetes</option>
                                                                    <option value="HC">Hipercolesterolemia</option>
                                                                    <option value="HL">Hiperlipidemia</option>
                                                                    <option value="CA">Cancer</option>
                                                                    <option value="CA">Obesidad</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <h9>ANTECEDENTES PATOLÓGICOS PROPIOS</h9>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar Enfermedad Actuál</label>
                                                                <select class="form-control form-control-sm" name="select_4" id="select_4" multiple="multiple">
                                                                    <option value="HP">Hipertensión</option>
                                                                    <option value="DI">Diabetes</option>
                                                                    <option value="HC">Hipercolesterolemia</option>
                                                                    <option value="HL">Hiperlipidemia</option>
                                                                    <option value="CA">Cancer</option>
                                                                    <option value="OB">Obesidad</option>
                                                                    <option value="OB">Hipertiroidismo</option>
                                                                    <option value="OB">Hipotiroidismo</option>
                                                                    <option value="OB">Cirugías</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar Síntomas Actuales</label>
                                                                <select class="form-control form-control-sm" name="select_5" id="select_5" multiple="multiple">
                                                                    <option value="HP">Diarrea</option>
                                                                    <option value="DI">Estreñimiento</option>
                                                                    <option value="HC">Gastritis</option>
                                                                    <option value="HL">Náusea</option>
                                                                    <option value="CA">Reflujo</option>
                                                                    <option value="CA">Colitis</option>
                                                                    <option value="CA">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Antecedentes Ginecológicos</label>
                                                                <select class="form-control form-control-sm" name="select_6" id="select_6" multiple="multiple">
                                                                    <option value="HP">Embarazo Actúal</option>
                                                                    <option value="DI">Anticonceptivos Orales</option>
                                                                    <option value="HC">Climatério</option>
                                                                    <option value="HC">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Otras Patologías Actuales</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Otros Síntomas Actuales</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Otros Antecedentes Ginecológicos</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Embarazo Actual N° Semanas</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Anticonceptivos ¿Cual?</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Terapia de Reemplazo Hormonal ¿Cual?</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Antecedentes Familiares-->
                                <!--FORMULARIO / SIGNOS VITALES Y OTROS-->
                                @include('atencion_otros_prof.generales.signos_vitales')
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
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Lúcido</option>
                                                                    <option value="CS">•	Obnubilado</option>
                                                                    <option value="CD">•	Desorientado</option>
                                                                    <option value="CS">•	Sopor</option>
                                                                    <option value="CD">•	Coma</option>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="eval_neurol">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#eval_neurol_c" aria-expanded="false" aria-controls="eval_neurol_c">
                                                Evaluación Examen Neurológico
                                            </button>
                                        </div>
                                        <div id="eval_neurol_c" class="collapse" aria-labelledby="eval_neurol" data-parent="#eval_neurol">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">LENGUAJE</h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="LA">Normal</option>
                                                                    <option value="LA">Alterado</option>
                                                                    <option value="LA">Muy alterado</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Alteración Lenguaje</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="AL">Alt de la denominación</option>
                                                                    <option value="LA">Alt de la Comprensión</option>
                                                                    <option value="LA">Alt de la Lecto-escritura</option>
                                                                    <option value="LA">Repeticiónes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                            <div class="form-group col-md-6">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono"></h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Alteración Modo</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="AL">Disartria</option>
                                                                    <option value="LA">Disfonía</option>
                                                                    <option value="LA">Afasia</option>
                                                                    <option value="LA">Disfasia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono"></h6>
                                                        </div>
                                                        <div class="form-group col-md-10">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">MEMORIA</h6>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">No Realizada</option>
                                                                    <option value="LA">Normal</option>
                                                                    <option value="LA">Alt. Memoria Inmediata</option>
                                                                    <option value="LA">Alt. Memoria Corto Plazo</option>
                                                                    <option value="LA">Alt. Memoria Largo Plazo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">PRAXIAS</h6>
                                                        </div>

                                                        <div class="form-group col-md-10">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mt-1">
                                                            <h6 class="form_fono">EVALUACION FUNCIONES COGNTIVAS SUPERIORES</h6>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">APREC.CAPACIDAD VISUAL</h6>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tipo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">•	No Examinada</option>
                                                                    <option value="N">•	Normal</option>
                                                                    <option value="CS">•	Presbicie</option>
                                                                    <option value="CS">•	Miopía</option>
                                                                    <option value="CD">•	Dudosa</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">APREC. VISO-ESPACIAL</h6>
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
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="eval_resp">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#eval_resp_c" aria-expanded="false" aria-controls="eval_resp_c">
                                                Evaluación Torax y Respiración
                                            </button>
                                        </div>
                                        <div id="eval_resp_c" class="collapse" aria-labelledby="eval_resp" data-parent="#eval_resp">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <h6 class="form_fono">INSPECCION<h6>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Tipo de Respiración</label>
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
                                                        <div class="col-md-2 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Forma Toráxica</label>
                                                            <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                <option value="AL">Seleccione</option>
                                                                <optgroup label="TORAX NORMAL">
                                                                    <option value="AL">Normal</option>
                                                                </optgroup>
                                                                <optgroup label="DEFORMACION CONGÉNITA">
                                                                    <option value="AL">Tórax Acanalado</option>
                                                                    <option value="AL">Pectus excavatum</option>
                                                                    <option value="AL">Tórax Piramidal</option>
                                                                    <option value="AL">Tórax Piriforme</option>
                                                                </optgroup>
                                                                <optgroup label="DEFORMACIÓN ADQUIRIDA">
                                                                    <option value="AL">Tórax Raquítico</option>
                                                                    <option value="AL">Tórax Enfisematoso</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Simetría Toraxica </label>
                                                            <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                <option value="AL">Seleccione</option>
                                                                <option value="AL">Simétrico</option>
                                                                <option value="AL">Asimétrico</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 ">
                                                           <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4 mt-1">
                                                            <label class="floating-label">Estado de la piél</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4 mt-1">
                                                            <label class="floating-label">Cianosis</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>

                                                        <div class="form-group col-md-2 mt-2">
                                                            <label class="floating-label">Movilidad Respiratoria</label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option value="AL">No Realizada</option>
                                                                <option value="LA">Alterada</option>
                                                                <option value="LA">Muy alterada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2 mt-2">
                                                            <label class="floating-label">Tiraje</label>
                                                            <select class="form-control form-control-sm" name="" id="">
                                                                <option value="AL">No Realizada</option>
                                                                <option value="LA">Alterada</option>
                                                                <option value="LA">Muy alterada</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">PALPACIÓN<h6>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                           <label class="floating-label">Puntos Dolorosos</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Vibración Vocal</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Expansibilidad</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Elasticidad</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Frémitos</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">PERCUSIÓN<h6>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">AUSCULTACIÓN<h6>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Pre Kine</h6>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Ruidos Respiratorios normales</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Ruidos Adventicios</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-2 mt-1">
                                                            <h6 class="form_fono">Post Kine</h6>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Ruidos Respiratorios normales</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Ruidos Adventicios</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Comentario de la Evaluación</label>
                                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">Conclusión examen Torax<h6>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">Objetivos y Tratamiento<h6>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!--Diagnóstico-->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" id="diagnostico">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                Diagnóstico y Plan de Tratamiento
                                            </button>
                                        </div>
                                        <div id="diagnostico_c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_pedgen" id="ind_pedgen">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Indicaciones</label>
                                                        <input type="text" class="form-control form-control-sm" name="ind_pedgen" id="ind_pedgen">
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


                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="interkine();"><i class="fa fa-plus"></i> Indicar Interconsulta</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="examenes_kine();"><i class="fa fa-plus"></i> Indicar examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informekine();"><i class="fa fa-plus"></i> Enviar Informe</button>
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
                                <h6 class="form_fono d-inline">CONTROLES KINESIOLÓGICOS</h6>
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
                                        <div class="col-sm-2 mt-2">
                                            <div class="form-group fill">
                                                <label id="" name="" class="floating-label-activo-sm">Tratamiento-1</label>
                                                <select class="form-control form-control-sm" name="tratamiento_1" id="tratamiento_1">
                                                    <option value="AL">Seleccione</option>
                                                    <option value="LA">Crioterapia</option>
                                                    <option value="LA">Galvanismo</option>
                                                    <option value="AL">Hidroterapia</option>
                                                    <option value="LA">Humidificación</option>
                                                    <option value="LA">Infrarrojo</option>
                                                    <option value="AL">Láser</option>
                                                    <option value="LA">lontoferesis</option>
                                                    <option value="LA">Magnetoterapia</option>
                                                    <option value="AL">Nebulizadores comunes</option>
                                                    <option value="LA">Nebulizadores ultrasónicos</option>
                                                    <option value="LA">Onda corta</option>
                                                    <option value="LA">Ultrasonoterapia</option>
                                                    <option value="LA">Ultravioleta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-2">
                                            <div class="form-group fill">
                                                 <label id="" name="" class="floating-label-activo-sm">Tratamiento-2</label>
                                                <select class="form-control form-control-sm" name="tratamiento_2" id="tratamiento_2">
                                                    <option value="AL">Seleccione</option>
                                                    <option value="LA">Crioterapia</option>
                                                    <option value="LA">Galvanismo</option>
                                                    <option value="AL">Hidroterapia</option>
                                                    <option value="LA">Humidificación</option>
                                                    <option value="LA">Infrarrojo</option>
                                                    <option value="AL">Láser</option>
                                                    <option value="LA">lontoferesis</option>
                                                    <option value="LA">Magnetoterapia</option>
                                                    <option value="AL">Nebulizadores comunes</option>
                                                    <option value="LA">Nebulizadores ultrasónicos</option>
                                                    <option value="LA">Onda corta</option>
                                                    <option value="LA">Ultrasonoterapia</option>
                                                    <option value="LA">Ultravioleta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-2">
                                            <div class="form-group fill">
                                                <label id="" name="" class="floating-label-activo-sm">Tratamiento-3</label>
                                                <select class="form-control form-control-sm" name="tratamiento_3" id="tratamiento_3">
                                                    <option value="AL">Seleccione</option>
                                                    <option value="LA">Crioterapia</option>
                                                    <option value="LA">Galvanismo</option>
                                                    <option value="AL">Hidroterapia</option>
                                                    <option value="LA">Humidificación</option>
                                                    <option value="LA">Infrarrojo</option>
                                                    <option value="AL">Láser</option>
                                                    <option value="LA">lontoferesis</option>
                                                    <option value="LA">Magnetoterapia</option>
                                                    <option value="AL">Nebulizadores comunes</option>
                                                    <option value="LA">Nebulizadores ultrasónicos</option>
                                                    <option value="LA">Onda corta</option>
                                                    <option value="LA">Ultrasonoterapia</option>
                                                    <option value="LA">Ultravioleta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mt-2">
                                            <label class="floating-label"> Comentario y Respuesta a Tratamiento</label>
                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Comentario de la Sesión</label>
                                            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="pares();"><i class="fa fa-plus"></i> Pares Craneanos</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="postura();"><i class="fa fa-plus"></i> Examen Motor Postura</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="metria();"><i class="fa fa-plus"></i> Metría</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="fuerza_sup();"><i class="fa fa-plus"></i> Examen Fuerza Extremidad Superior</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="fuerza_inf();"><i class="fa fa-plus"></i> Examen Fuerza Extremidad Inferior</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="tono_sup() ;"><i class="fa fa-plus"></i> Examen Tono Extremidad Superior</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="tono_inf();"><i class="fa fa-plus"></i> Examen Tono Extremidad Inferior</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="reflejos();"><i class="fa fa-plus"></i> Reflejos</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="sensibilidad();"><i class="fa fa-plus"></i> Sensibilidad</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="func_global();"><i class="fa fa-plus"></i> Funcionalidad Global</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-sm btn-success btn-block text-left" onclick="informekine();"><i class="fa fa-plus"></i> Informe Kinesiología</button>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE: CONTROLES ATENCIÓN-->
                 <!--HISTORICO CONTROLES ATENCIÓN -->
                <div class="tab-pane fade" id="h_control" role="tabpanel" aria-labelledby="h_control-tab">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="form_fono d-inline">HISTÓRICO CONTROLES </h6>
                            </div>
                            <div class="card-body shadow-none" id="form_0_fono">
                                <form>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <table id="aten_previas" class="display table dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Sesion N°</th>
                                                        <th class="text-center align-middle">Sesiones Faltantes</th>
                                                        <th class="text-center align-middle">Trabajo en</th>
                                                        <th class="text-center align-middle">Objetivo Logrado?</th>
                                                        <th class="text-center align-middle">Técnicas</th>
                                                        <th class="text-center align-middle">Ver Control</th>
                                                        <th class="text-center align-middle">Ver Documentos</th>
                                                        <th class="text-center align-middle">Ver Informe Final</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">23/03/2020</td>
                                                        <td class="text-center align-middle">1</td>
                                                        <td class="text-center align-middle">9</td>
                                                        <td class="text-center align-middle">Hombro Der</td>
                                                        <td class="text-center align-middle">Si</td>
                                                        <td class="text-center align-middle">Ultrasonido</td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Control</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-success btn-sm"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-secondary btn-sm"><i class="feather icon-file-plus"></i> Ver Informe</button>
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
                                                            <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Control</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-success btn-sm"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-secondary btn-sm"><i class="feather icon-file-plus"></i> Ver Informe</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE: HISTORICO CONTROLES ATENCIÓN-->
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
function interkine() {
    $('#modal_interkine').modal('show');
}
function informekine() {
    $('#informe_kine').modal('show');
}

function examenes_kine() {
    $('#indicar_examen_kine').modal('show');
}
function e_plan() {
    $('#plan').modal('show');
}
function postura() {
    $('#postura').modal('show');
}
function metria() {
    $('#metria').modal('show');
}
function fuerza_sup() {
    $('#fuerza_sup').modal('show');
}
function fuerza_inf() {
    $('#fuerza_inf').modal('show');
}
function tono_sup() {
    $('#tono_sup').modal('show');
}
function tono_inf() {
    $('#tono_inf').modal('show');
}
function reflejos() {
    $('#reflejos').modal('show');
}
function sensibilidad() {
    $('#sensibilidad').modal('show');
}
function func_global() {
    $('#func_global').modal('show');
}
function pares() {
    $('#pares').modal('show');
}

</script>
@endsection


