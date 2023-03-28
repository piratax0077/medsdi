<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab" href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Atención General</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="atencion_nutri-tab" data-toggle="tab" href="#atencion_nutri" role="tab" aria-controls="atencion_nutri" aria-selected="true">Atención nutricional</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="control-tab" data-toggle="tab" href="#control" role="tab" aria-controls="control" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="h_control-tab" data-toggle="tab" href="#h_control" role="tab" aria-controls="h_control" aria-selected="false">Histórico Controles</a>
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
                                                            <button type="button" class="btn btn-success btn-block btn-sm " onclick="e_plan_nutri();"><i class="fa fa-plus"></i> Plan de Tratamiento</button>
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
                                <!--Medicamentos o Examen-->

                               <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="internutri();"><i class="fa fa-plus"></i> Indicar Interconsulta preg</button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="examenes_nutri();"><i class="fa fa-plus"></i> Indicar examen Especialidad preg </button>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informeNutri() ;"><i class="fa fa-plus"></i> Enviar Informe preg </button>
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
                <div class="tab-pane fade " id="atencion_nutri" role="tabpanel" aria-labelledby="atencion_nutri-tab">
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
                                <!--Evaluación Nutricional-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="e_nutricional">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#e_nutricional_c" aria-expanded="false" aria-controls="e_nutricional_c">
                                                Evaluación Nutricional
                                            </button>
                                        </div>
                                        <div id="e_nutricional_c" class="collapse" aria-labelledby="e_nutricional" data-parent="#e_nutricional">
                                            <div class="card-body shadow-none" id="nutri">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mt-1">
                                                            <h6 class="form_fono">ESTILO DE VIDA Y ACTIVIDADES DIARIAS</h6>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <h6 class="form_fono">Habitos de Consumo Frecuencia/Cantidad</h6>
                                                    <hr />
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Alcohol</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Tabaco</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Café</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Drogas</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">Actividad Física</h6>
                                                    <hr />
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar Tipo Actividad</label>
                                                                <select class="form-control form-control-sm" name="select_13" id="select_13" multiple="multiple">
                                                                    <option value="HP">Gimnasio</option>
                                                                    <option value="DI">Trote</option>
                                                                    <option value="HC">Máquinas(en casa)</option>
                                                                    <option value="HL">Caminata</option>
                                                                    <option value="CA">Deporte</option>
                                                                    <option value="CA">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label">Seleccionar Tipo de Esfuerzo</label>
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">• Muy Ligero</option>
                                                                    <option value="N">• Moderado</option>
                                                                    <option value="CS">• Pesado</option>
                                                                    <option value="CD">• Excepcional</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Seleccionar Tipo</label>
                                                                <select class="form-control form-control-sm" name="select_14" id="select_14" multiple="multiple">
                                                                    <option value="HP">Gimnasio</option>
                                                                    <option value="DI">Trote</option>
                                                                    <option value="HC">Máquinas(en casa)</option>
                                                                    <option value="HL">Caminata</option>
                                                                    <option value="CA">Deporte</option>
                                                                    <option value="CA">Otro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6 ">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm ">Frecuencia</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 ">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Duración</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label id="" name="" class="floating-label-activo-sm">Observaciones Estilo y hábitos</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">Examen Físico</h6>
                                                    <hr />
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Aspecto Gen.(Pelo,Ojos,Piél,Labios,Etc.</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-9">
                                                            <label class="floating-label-activo-sm">Examenes Solicitados resultados?</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Presión Arterial</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="form_fono">Indicadores Dietéticos</h6>
                                                    <hr />
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Comidas en Casa</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Horario</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Fuera de Casa</label>
                                                            <input type="url" class="form-control form-control-sm" name="" id="">
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Tipo de Comida Fuera de Casa</label>
                                                            <input type="url" class="form-control form-control-sm" name="" id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                                <div class="form-group fill">
                                                                    <label id="" name="" class="floating-label-activo-sm">Ha Modificado Dieta?</label>
                                                                    <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                        <option value="NE">• Si</option>
                                                                        <option value="N">•	No</option>
                                                                        <option value="CS">• Ocacionalmente</option>
                                                                    </select>
                                                                </div>

                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Motivo</label>
                                                            <input type="url" class="form-control form-control-sm" name="" id="">
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Apetito</label>
                                                            <div class="form-group fill">
                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                    <option value="NE">• Bueno</option>
                                                                    <option value="N">•	Regular</option>
                                                                    <option value="CS">• Malo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">A Que Hora Siente Hambre</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Alimentos preferidos</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Alimentos que no le agradan / no acostumbra</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Alimentos que le causan malestar (especificar):</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Alérgia Alimentos</label>
                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                    <option value="NE">• Si</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="CS">• No Sabe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 mt-1">
                                                            <label class="floating-label-activo-sm"> Cuales Alimentos  (especificar):</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Suplementos Alimentarios</label>
                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                    <option value="NE">• Si</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="CS">• Ocacionalmente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 mt-1">
                                                            <label class="floating-label-activo-sm"> Cuales Suplementos (especificar):</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Cambia su apetito con estado de ánimo? </label>
                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                    <option value="NE">• Si</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="CS">• Ocacionalmente</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5 ">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm"> De Que Modo:</label>
                                                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Agrega Sal a su Comida? </label>
                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                    <option value="NE">• Si</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="CS">• Ocacionalmente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label class="floating-label-active-sm">Qué grasa utilizan en casa para preparar su comida:</label>
                                                                <select class="form-control form-control-sm" name="select_15" id="select_15" multiple="multiple">
                                                                    <option value="HP">Margarina</option>
                                                                    <option value="DI">Mantequilla  </option>
                                                                    <option value="HC"> Manteca </option>
                                                                    <option value="HL">Aceite vegetal</option>
                                                                    <option value="CA">Aceite Oliva</option>
                                                                    <option value="CA">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Ha hecho Dieta </label>
                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                    <option value="NE">• Si</option>
                                                                    <option value="N">•	No</option>
                                                                    <option value="CS">• Ocacionalmente</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Motivo</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Por cuanto Tiempo</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Medicamentos?</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                 <button type="button" class="btn btn-success btn-block btn-sm " onclick="dieta_diaria_nutri();"><i class="fa fa-plus"></i>Ingesta Diaria</button>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                               <button type="button" class="btn btn-success btn-block btn-sm " onclick="indicadores_nutri();"><i class="fa fa-plus"></i> Cálculo Necesidades</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mt-1">
                                                            <div class="form-group fill">
                                                                <button type="button" class="btn btn-success btn-block btn-sm " onclick="encuesta_nutri();"><i class="fa fa-plus"></i> Encuesta de Consumo</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Evaluación Antropometrica-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="ind_antropo">
                                            <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ind_antropo_c" aria-expanded="false" aria-controls="ind_antropo_c">
                                                Indicadores Antropométricos
                                            </button>
                                        </div>
                                        <div id="ind_antropo_c" class="collapse" aria-labelledby="ind_antropo" data-parent="#ind_antropo">
                                            <div class="card-body shadow-none" id="nutri">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mt-1">
                                                            <h6 class="form_fono">MEDIDAS DEL PACIENTE</h6>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Peso Actúal (Kg)</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Peso Habitual (Kg)</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Estatura (Mts)</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Pliegue Cutáneo Tricipital (mm)</label>
                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Pliegue Cutáneo Bicipital (mm)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm ">Pliegue Cutáneo Subescapular (mm)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm ">Pliegue Cutáneo Suprailíaco(mm)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                         <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm ">Circunferencia Brazo(Cm.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Circunferencia Cintura(Cm.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Circunferencia cadera(Cm.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Circunferencia Abdominal (Cm.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                         <div class="col-md-3 mt-1">
                                                            <label class="floating-label-activo-sm">Otro</label>
                                                            <input type="url" class="form-control form-control-sm" name="" id="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">

                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Observaciones Medidas del Paciente</label>
                                                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                        </div>

                                                    </div>
                                                     <div class="form-row">
                                                        <div class="col-md-12 mt-1">
                                                            <h6 class="form_fono">EVALUACIÓN DEL PACIENTE</h6>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Complexión</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Peso Teórico(Kg.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">% Peso Teórico</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">% Peso Habitúal</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Imc (Kg./Mt2)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Peso Min/Máx (por IMC Kg.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">% Grasa Corporal </label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Grasa Corporal Total(Kg.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Masa Libre de Grasa(Kg.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">% Exc/Def. grasa corporal</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Exc/Def grasa corporal (kg)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                         <div class="col-md-3 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">P.C.T + P.C.S (percent.)</label>
                                                            <input type="url" class="form-control form-control-sm" name="" id="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">P.C.T (percent.)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm ">P.C.S (percent.</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                 <label id="" name="" class="floating-label-activo-sm ">Ind. cintura-cadera (cm)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                          <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                 <label id="" name="" class="floating-label-activo-sm ">Circunf. abdominal (cm)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Área musc. brazo (cm2)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Masa muscular total (kg)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-1">
                                                            <div class="form-group fill">
                                                                <label id="" name="" class="floating-label-activo-sm">Agua corporal total (lt)</label>
                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                            </div>
                                                        </div>
                                                         <div class="col-md-3 mt-1">
                                                            <label id="" name="" class="floating-label-activo-sm">Otros</label>
                                                            <input type="url" class="form-control form-control-sm" name="" id="">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Observaciones Evaluación del Paciente</label>
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
                                                            <button type="button" class="btn btn-success btn-block btn-sm " onclick="e_plan_nutri();"><i class="fa fa-plus"></i> Plan de Tratamiento</button>
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


                                <!--Medicamentos o Examen-->

                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="internutri();"><i class="fa fa-plus"></i> Indicar Interconsulta</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="examenes_nutri();"><i class="fa fa-plus"></i>examen Especialidad</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="dieta_nutri();"><i class="fa fa-plus"></i> Indicar Dieta</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="informeNutri() ;"><i class="fa fa-plus"></i> Enviar Informe</button>
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
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="card" style="width: 100%">
                            <div class="col-sm-12">
                                <div class="row">
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
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">PESO INICIAL</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">PESO ACTUAL</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">VARIACIÓN</label>
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
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Sesión N°</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Trabajo en :</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                </div>

                                                <div class="form-group col-md-3">
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
                                                <div class="form-group col-md-12 mt-2">
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

                                        </form>
                                    </div>
                                </div>
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
                                            <table id="atenciones_previas" class="display table dt-responsive nowrap pb-4 table-sm" style="width:100%">
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
function internutri() {
    $('#modal_interconsulta_nutri').modal('show');
}
function informeNutri() {
    $('#informe_nutri').modal('show');
}

function examenes_nutri() {
    $('#indicar_examen_nutri').modal('show');
}
function e_plan_nutri() {
    $('#plan_nutri').modal('show');
}
function dieta_diaria_nutri() {
    $('#m_dieta_diaria').modal('show');
}
function encuesta_nutri() {
    $('#m_test_alimentacion_mens').modal('show');
}
function dieta_nutri() {
    $('#m_dieta_nutri').modal('show');
}
function dieta_diab() {
    $('#m_rec_diab').modal('show');
}
function raciones() {
    $('#m_raciones').modal('show');
}
function indicadores_nutri() {
    $('#m_indicadores_nutri').modal('show');
}
</script>
@endsection


