<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="nutri" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion-tab" data-toggle="tab" href="#atencion" role="tab" aria-controls="atencion" aria-selected="true">Atención General</a>
                    </li>
                    {{--  <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="atencion_nutri-tab" data-toggle="tab" href="#atencion_nutri" role="tab" aria-controls="atencion_nutri" aria-selected="true">Atención nutricional</a>
                    </li>  --}}
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="control-tab" data-toggle="tab" href="#control" role="tab" aria-controls="control" aria-selected="false">Controles</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="h_control-tab" data-toggle="tab" href="#h_control" role="tab" aria-controls="h_control" aria-selected="false">Historial de controles</a>
                    </li>
                </ul>
            </div>
             <!--ALERTA-->
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
                <div class="tab-content" id="nutri-contenido">
                    <!--ATENCION GENERAL-->
                    <div class="tab-pane fade show active" id="atencion" role="tabpanel" aria-labelledby="atencion-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--Formulario / Menor de edad-->
                                    @include('general.secciones_ficha.seccion_menor')
                                    <!--Cierre: Formulario / Menor de edad-->

                                    <!--Motivo consulta-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="motivop">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivop_c" aria-expanded="false" aria-controls="motivop_c">
                                                    Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="motivop_c" class="collapse show" aria-labelledby="motivop" data-parent="#motivop">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label id="motivo_consulta" class="floating-label-activo-sm">Tipo de consulta</label>
                                                                <select class="form-control form-control-sm" name="" id="">
                                                                    <option value="AL">Espontanea</option>
                                                                    <option value="LA">Derivada</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Derivado por</label>
                                                                <input type="text" class="form-control form-control-sm" name="deriv_por" id="deriv_por">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Diagn. de Ingreso</label>
                                                                <input type="text" class="form-control form-control-sm" name="dg_ingreso" id="dg_ingreso">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Se solicita</label>
                                                                <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">N° de Sesiones</label>
                                                                <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Otra</label>
                                                                <input type="text" class="form-control form-control-sm" name="solicitud" id="solicitud">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Antecedentes Familiares-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="antec_fam">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_fam_c" aria-expanded="false" aria-controls="antec_fam_c">
                                                    Antecedentes patológicos propios y familiares de la especialidad
                                                </button>
                                            </div>
                                            <div id="antec_fam_c" class="collapse show" aria-labelledby="antec_fam" data-parent="#antec_fam">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <h6 class="text-c-blue">ANTECEDENTES FAMILIARES</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Seleccionar patologias paternas</label>
                                                                <select class="form-control form-control-sm" name="select_1" id="select_1" multiple="multiple">
                                                                    <option value="HP">Hipertensión</option>
                                                                    <option value="DI">Diabetes</option>
                                                                    <option value="HC">Hipercolesterolemia</option>
                                                                    <option value="HL">Hiperlipidemia</option>
                                                                    <option value="CA">Cancer</option>
                                                                    <option value="CA">Obesidad</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Seleccionar patologias maternas</label>
                                                                <select class="form-control form-control-sm" name="select_2" id="select_2" multiple="multiple">
                                                                    <option value="HP">Hipertensión</option>
                                                                    <option value="DI">Diabetes</option>
                                                                    <option value="HC">Hipercolesterolemia</option>
                                                                    <option value="HL">Hiperlipidemia</option>
                                                                    <option value="CA">Cancer</option>
                                                                    <option value="CA">Obesidad</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Seleccionar patologias familiares</label>
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
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <h6 class="text-c-blue mt-3">ANTECEDENTES PATOLÓGICOS PROPIOS</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Seleccionar enfermedad actual</label>
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
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Seleccionar síntomas actuales</label>
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
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Antecedentes ginecológicos</label>
                                                                <select class="form-control form-control-sm" name="select_6" id="select_6" multiple="multiple">
                                                                    <option value="HP">Embarazo Actúal</option>
                                                                    <option value="DI">Anticonceptivos Orales</option>
                                                                    <option value="HC">Climatério</option>
                                                                    <option value="HC">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Otras patologías actuales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Otros síntomas actuales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Otros antecedentes ginecológicos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Embarazo actual N° Semanas</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Anticonceptivos ¿Cuáles?</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Terapia de reemplazo hormonal ¿Cual?</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--EVALUACIÓN NUTRICIONAL-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="e_nutricional">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#e_nutricional_c" aria-expanded="false" aria-controls="e_nutricional_c">
                                                    Evaluación nutricional
                                                </button>
                                            </div>
                                            <div id="e_nutricional_c" class="collapse" aria-labelledby="e_nutricional" data-parent="#e_nutricional">
                                                <div class="card-body-aten-a" id="nutri">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="hab-consumo-tab" data-toggle="tab" href="#hab-consumo" role="tab" aria-controls="hab-consumo" aria-selected="true">Hábitos de consumo</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="act-fisica-tab" data-toggle="tab" href="#act-fisica" role="tab" aria-controls="act-fisica" aria-selected="false">Actividad fisica</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="exam-fisico-tab" data-toggle="tab" href="#exam-fisico" role="tab" aria-controls="exam-fisico" aria-selected="false">Examen físico</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="in-diet-tab" data-toggle="tab" href="#in-diet" role="tab" aria-control="in-diet" aria-selected="false">Indicadores dietéticos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="antecedentes-nutri-tab" data-toggle="tab" href="#antecedentes-nutri" role="tab" aria-control="antecedentes-nutri" aria-selected="false">Antecedentes</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="ev-nutricional">
                                                                <!--HABITOS DE CONSUMO-->
                                                                <div class="tab-pane fade show active" id="hab-consumo" role="tabpanel" aria-labelledby="hab-consumo-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="text-c-blue mb-3">HÁBITOS DE CONSUMO</h6>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Alcohol</label>
                                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Tabaco</label>
                                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Café</label>
                                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Drogas</label>
                                                                                 <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--ACTIVIDAD FISICA-->
                                                                <div class="tab-pane fade show" id="act-fisica" role="tabpanel" aria-labelledby="act-fisica-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="text-c-blue mb-3">ACTIVIDAD FÍSICA</h6>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Tipo actividades</label>
                                                                                <select class="form-control form-control-sm" name="select_13" id="select_13" multiple="multiple">
                                                                                    <option value="HP">Gimnasio</option>
                                                                                    <option value="DI">Trotar</option>
                                                                                    <option value="HC">Máquinas (Casa)</option>
                                                                                    <option value="HL">Caminata</option>
                                                                                    <option value="DB">Deporte de baja intensidad</option>
                                                                                    <option value="DM">Deporte de mediana intensidad</option>
                                                                                    <option value="DA">Deporte de alta intensidad</option>
                                                                                    <option value="EC">Pesas y Cardio (Casa)</option>
                                                                                    <option value="EG">Pesas y Cardio (Gym)</option>
                                                                                    <option value="CF">Crossfit</option>
                                                                                    <option value="OT">Otro</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Tipo de esfuerzo</label>
                                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                                    <option value="NE">Muy ligero</option>
                                                                                    <option value="N">Moderado</option>
                                                                                    <option value="CS">Pesado</option>
                                                                                    <option value="CD">Excepcional</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm ">Frecuencia</label>
                                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                           <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Duración</label>
                                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Observaciones estilo y hábitos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--EXÁMEN FÍSICO-->
                                                                <div class="tab-pane fade show" id="exam-fisico" role="tabpanel" aria-labelledby="exam-fisico-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="text-c-blue mb-3">EXÁMEN FÍSICO</h6>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Aspecto geneneral</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" placeholder="Pelo, ojos, piél, labios,etc..." rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                <label class="floating-label-activo-sm">Examenes solicitados ¿Resultados?</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Presión arterial</label>
                                                                                <input type="url" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--INDICADORES DIETÉTICOS-->
                                                                <div class="tab-pane fade show" id="in-diet" role="tabpanel" aria-labelledby="in-diet-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-md-12">
                                                                            <div class="card-informacion">
                                                                                <div class="card-body">
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                                <a class="nav-link-aten text-reset active " id="comidas-tab" data-toggle="tab" href="#comidas" role="tab" aria-controls="comidas" aria-selected="false">Comidas</a>
                                                                                                <a class="nav-link-aten text-reset" id="dieta-tab" data-toggle="tab" href="#dieta" role="tab" aria-controls="dieta" aria-selected="true">Dieta</a>
                                                                                                <a class="nav-link-aten text-reset" id="alim_prob-tab" data-toggle="tab" href="#alim_prob" role="tab" aria-controls="alim_prob" aria-selected="false">Alimentos Problema</a>
                                                                                                <a class="nav-link-aten text-reset" id="alim_preferidos-tab" data-toggle="tab" href="#alim_preferidos" role="tab" aria-controls="alim_preferidos" aria-selected="false">Alimentos Preferidos</a>
                                                                                                <a class="nav-link-aten text-reset" id="uso_med_ot-tab" data-toggle="tab" href="#uso_med_ot" role="tab" aria-controls="uso_med_ot" aria-selected="false">Uso de Medicamentos/ otros</a>
                                                                                                <a class="nav-link-aten text-reset" id="uso_sal_gr-tab" data-toggle="tab" href="#uso_sal_gr" role="tab" aria-controls="uso_sal_gr" aria-selected="false">Uso de Sal /Grasas</a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
                                                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                                                <div class="tab-pane fade show active" id="comidas" role="tabpanel" aria-labelledby="comidas-tab">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <h6 class="text-c-blue mb-3">COMIDAS</h6>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Cantidad de comidas al día</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="comidas_dia" id="comidas_dia">
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">¿Come a horarios?</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="comidas_dia" id="comidas_dia">
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">¿Se salta comidas?</label>
                                                                                                                <select class="form-control form-control-sm" name="saltar_comidas" id="saltar_comidas">
                                                                                                                    <option value="NE">Seleccione</option>
                                                                                                                    <option value="NE">Si</option>
                                                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">¿Porque se las salta?</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="salto_comida" id="salto_comida"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">¿Que consume en la colación?</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="salto_comida" id="salto_comida"></textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Comidas en casa</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comidas_casa" id="comidas_casa"></textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Fuera de casa</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Tipos de comida fuera de casa</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comidas_casa" id="comidas_casa"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <div class="form-group">
                                                                                                                    <label class="floating-label-activo-sm">Observaciones Comidas</label>
                                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade show" id="dieta" role="tabpanel" aria-labelledby="dieta-tab">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                <label class="floating-label-activo-sm">¿Ha realizado dieta? </label>
                                                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                                                    <option value="NE">Si</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                                                <label class="floating-label-activo-sm">¿Por cuanto tiempo?</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">¿Ha Modificado Dieta?</label>
                                                                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                                                                    <option value="NE">Si</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Apetito</label>
                                                                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                                                                    <option value="NE">Bueno</option>
                                                                                                                    <option value="N">Regular</option>
                                                                                                                    <option value="CS">Malo</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Horario en que siente hambre</label>
                                                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-row">
                                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <label class="floating-label-activo-sm">Observaciones Dieta</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones oidos" data-seccion="Oídos Audición" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade" id="alim_prob" role="tabpanel" aria-labelledby="alim_prob-tab">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <label class="floating-label-activo-sm">Alimentos que no le agradan / No acostumbra</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <label class="floating-label-activo-sm">Alimentos que le causan malestar (Especificar)</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label  class="floating-label-activo-sm">Alérgia alimentos</label>
                                                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                                                    <option value="NE">Si</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                    <option value="CS">No sabe</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                <label class="floating-label-activo-sm"> ¿Cuales alimentos? (Especificar)</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade" id="alim_preferidos" role="tabpanel" aria-labelledby="alim_preferidos-tab">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <label class="floating-label-activo-sm">Alimentos preferidos</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <label class="floating-label-activo-sm"> Cantidad semanal (Especificar)</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade" id="uso_med_ot" role="tabpanel" aria-labelledby="uso_med_ot-tab">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">Suplementos alimentarios</label>
                                                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                                                    <option value="NE">Si</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                <label class="floating-label-activo-sm"> Cuales Suplementos (Especificar)</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                                <label class="floating-label-activo-sm">¿Medicamentos?</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="medicamentos" id="medicamentos"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="tab-pane fade" id="uso_sal_gr" role="tabpanel" aria-labelledby="uso_sal_gr-tab">
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                                                <label class="floating-label-activo-sm">¿Agrega sal a su comida? </label>
                                                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                                                    <option value="SA">Si, alta cantidad</option>
                                                                                                                    <option value="SM">Si, mediana cantidad</option>
                                                                                                                    <option value="SB">Si, baja cantidad</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                            <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                                                <label class="floating-label-activo-sm">¿Qué grasa utilizan en casa para preparar su comida?</label>
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
                                                                                                        <div class="form-row">
                                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <label class="floating-label-activo-sm">¿Su apetito cambia con el estado de ánimo? </label>
                                                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                                                    <option value="NE">Si</option>
                                                                                                                    <option value="N">No</option>
                                                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                                <label class="floating-label-activo-sm"> ¿De que modo?</label>
                                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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
                                                                    <form>
                                                                        {{--  <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="text-c-blue mb-3">INDICADORES DIETÉTICOS</h6>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Cantidad de comidas al día</label>
                                                                                <input type="text" class="form-control form-control-sm" name="comidas_dia" id="comidas_dia">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">¿Come a horarios?</label>
                                                                                <input type="text" class="form-control form-control-sm" name="comidas_dia" id="comidas_dia">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">¿Se salta comidas?</label>
                                                                                <select class="form-control form-control-sm" name="saltar_comidas" id="saltar_comidas">
                                                                                    <option value="NE">Seleccione</option>
                                                                                    <option value="NE">Si</option>
                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                    <option value="N">No</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">¿Porque se las salta?</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="salto_comida" id="salto_comida"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">¿Que consume en la colación?</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="salto_comida" id="salto_comida"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Comidas en casa</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comidas_casa" id="comidas_casa"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Fuera de casa</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Tipos de comida fuera de casa</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="comidas_casa" id="comidas_casa"></textarea>
                                                                            </div>
                                                                        </div>  --}}
                                                                        <div class="form-row">
                                                                            {{--  <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">¿Ha Modificado Dieta?</label>
                                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                                    <option value="NE">Si</option>
                                                                                    <option value="N">No</option>
                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Apetito</label>
                                                                                <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                                                    <option value="NE">Bueno</option>
                                                                                    <option value="N">Regular</option>
                                                                                    <option value="CS">Malo</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Horario que siente hambre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>  --}}
                                                                            {{--  <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Alimentos preferidos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>  --}}
                                                                            {{--  <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Alimentos que no le agradan / No acostumbra</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Alimentos que le causan malestar (Especificar)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label  class="floating-label-activo-sm">Alérgia alimentos</label>
                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                    <option value="NE">Si</option>
                                                                                    <option value="N">No</option>
                                                                                    <option value="CS">No sabe</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                <label class="floating-label-activo-sm"> ¿Cuales alimentos? (Especificar)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>  --}}
                                                                            {{--  <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                <label class="floating-label-activo-sm">Suplementos alimentarios</label>
                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                    <option value="NE">Si</option>
                                                                                    <option value="N">No</option>
                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">¿Cuales Suplementos? (Especificar)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                                            </div>  --}}

                                                                            {{--  <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">¿Agrega sal a su comida?</label>
                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                    <option value="SA">Si, alta cantidad</option>
                                                                                    <option value="SM">Si, mediana cantidad</option>
                                                                                    <option value="SB">Si, baja cantidad</option>
                                                                                    <option value="N">No</option>
                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">¿Qué grasa utilizan en casa para preparar su comida?</label>
                                                                                <select class="form-control form-control-sm" name="select_15" id="select_15" multiple="multiple">
                                                                                    <option value="HP">Margarina</option>
                                                                                    <option value="DI">Mantequilla  </option>
                                                                                    <option value="HC"> Manteca </option>
                                                                                    <option value="HL">Aceite vegetal</option>
                                                                                    <option value="CA">Aceite Oliva</option>
                                                                                    <option value="CA">Otros</option>
                                                                                </select>
                                                                            </div>  --}}
                                                                            {{--  <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">¿Ha ralizado dieta? </label>
                                                                                <select class="form-control form-control-sm" name="alergia_alimentos" id="alergia_alimentos">
                                                                                    <option value="NE">Si</option>
                                                                                    <option value="N">No</option>
                                                                                    <option value="CS">Ocacionalmente</option>
                                                                                </select>
                                                                            </div>  --}}
                                                                            {{--  <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">¿Por cuanto tiempo?</label>
                                                                                <input type="text" class="form-control form-control-sm" name="" id="">
                                                                            </div>  --}}
                                                                            {{--  <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">¿Medicamentos?</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="medicamentos" id="medicamentos"></textarea>
                                                                            </div>  --}}
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="dieta_diaria_nutri();"><i class="fa fa-plus"></i> Ingesta Diaria</button>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="indicadores_nutri();"><i class="fa fa-plus"></i> Cálculo Necesidades</button>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 my-2">
                                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="encuesta_nutri();"><i class="fa fa-plus"></i> Encuesta de Consumo</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                 <!--ANTECEDENTES-->
                                                                 <div class="tab-pane fade show" id="antecedentes-nutri" role="tabpanel" aria-labelledby="antecedentes-nutri-tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <h6 class="text-c-blue mb-3">ANTECEDENTES</h6>
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
                                    </div>
                             
                                    <!--Diagnóstico-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="diagnostico">
                                              
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button"  data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                    Diagnóstico y plan de tratamiento
                                                </button>
                                            </div>
                                            <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten-a">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                            <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label class="floating-label-activo-sm">Indicaciones</label>
                                                             <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_pedgen" id="ind_pedgen"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="e_plan_nutri();"><i class="feather icon-file-plus"></i> Plan de Tratamiento</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="alert alert-success" role="alert">
                                                              <i class="fas fa-check-circle"></i> Se añadió un plan de tratamiento.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Medicamentos o Examen-->
                                    <div class="card">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 pr-3 pl-3">
                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="internutri();"><i class="feather icon-edit-1"></i> Indicar interconsulta</button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 pr-3 pl-3">
                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="examenes_nutri();"><i class="feather icon-edit-1"></i> Indicar examen especialidad </button>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3 pr-3 pl-3">
                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="informeNutri() ;"><i class="feather icon-edit-1"></i> Enviar informe</button>
                                            </div>
                                        </div>
                                    </div>

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
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <h6 class="text-c-blue f-20">Controles</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card-a">
                                    <div class="card-body pb-0">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset active" id="nutri_obesidad_tab" data-toggle="tab" href="#nutri_obesidad" role="tab" aria-controls="nutri_obesidad" aria-selected="true">Obesidad</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_diabetes_tab" data-toggle="tab" href="#nutri_diabetes" role="tab" aria-controls="nutri_diabetes" aria-selected="false">Diabetes</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_hipertension_tab" data-toggle="tab" href="#nutri_hipertension" role="tab" aria-controls="nutri_hipertension" aria-selected="false"> Hipertensión</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_dislipidemias_tab" data-toggle="tab" href="#nutri_dislipidemias" role="tab" aria-controls="nutri_dislipidemias" aria-selected="false"> Dislipidemias</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_irenaltab" data-toggle="tab" href="#nutri_irenal" role="tab" aria-control="nutri_irenal" aria-selected="false"> Insuficiencia Renal </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="nutri_hiperuric_tab" data-toggle="tab" href="#nutri_hiperuric" role="tab" aria-control="nutri_hiperuric" aria-selected="false"> Hiperuricemia </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="tab-content" id="ev-nutricional">
                                    <!--OBESIDAD-->
                                    <div class="tab-pane fade show active" id="nutri_obesidad" role="tabpanel" aria-labelledby="nutri_obesidad_tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Obesidad</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso inicial</label>
                                                                    <input type="text" class="form-control form-control-sm" name="peso_inicial_control" id="peso_inicial_control">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso actual</label>
                                                                    <input type="text" class="form-control form-control-sm" name="peso_actual_control" id="peso_actual_control">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="peso_variacion_control" id="peso_variacion_control">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="control_logro_obj" id="control_logro_obj">
                                                                        <option value="1">Si</option>
                                                                        <option value="2">No</option>
                                                                        <option value="3">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión N°</label>
                                                                    <input type="text" class="form-control form-control-sm" name="num_sesion" id="num_sesion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo en</label>
                                                                    <input type="text" class="form-control form-control-sm" name="trabajo_en" id="trabajo_en">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text" class="form-control form-control-sm" name="colaboracion" id="colaboracion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Cumple indicaciones</label>
                                                                    <select class="form-control form-control-sm" name="control_cumple" id="control_cumple">
                                                                        <option value="1">Si</option>
                                                                        <option value="2">No</option>
                                                                        <option value="3">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm"> Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_res_trat" id="com_res_trat"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Comentario de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_sesion" id="com_sesion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>              
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar control peso</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--DIABETES-->
                                    <div class="tab-pane fade show" id="nutri_diabetes" role="tabpanel" aria-labelledby="nutri_diabetes_tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Diabetes</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Última Glicemia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso actual</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación Peso</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="" id="">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión N°</label>
                                                                    <input type="text" class="form-control form-control-sm" name="num_sesion" id="num_sesion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo en</label>
                                                                    <input type="text" class="form-control form-control-sm" name="trabajo_en" id="trabajo_en">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text" class="form-control form-control-sm" name="colaboracion" id="colaboracion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="ob_log" id="ob_log">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm"> Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_res_trat" id="com_res_trat"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Comentario de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_sesion" id="com_sesion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar control Diabetes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--HIPERTENSIÓN-->
                                    <div class="tab-pane fade show" id="nutri_hipertension" role="tabpanel" aria-labelledby="nutri_hipertension_tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Hipertensión</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Presión Arterial</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso actual</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="" id="">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión N°</label>
                                                                    <input type="text" class="form-control form-control-sm" name="num_sesion" id="num_sesion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo en</label>
                                                                    <input type="text" class="form-control form-control-sm" name="trabajo_en" id="trabajo_en">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text" class="form-control form-control-sm" name="colaboracion" id="colaboracion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="ob_log" id="ob_log">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm"> Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_res_trat" id="com_res_trat"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Comentario de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_sesion" id="com_sesion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--DISLIPIDEMIAS-->
                                    <div class="tab-pane fade show" id="nutri_dislipidemias" role="tabpanel" aria-labelledby="nutri_dislipidemias_tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Dislipidemias</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colesterol y trigic</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colesterol y trigico actual</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="" id="">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión N°</label>
                                                                    <input type="text" class="form-control form-control-sm" name="num_sesion" id="num_sesion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo en</label>
                                                                    <input type="text" class="form-control form-control-sm" name="trabajo_en" id="trabajo_en">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text" class="form-control form-control-sm" name="colaboracion" id="colaboracion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="ob_log" id="ob_log">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm"> Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_res_trat" id="com_res_trat"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Comentario de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_sesion" id="com_sesion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--INSUFICIENCIA RENAL-->
                                    <div class="tab-pane fade show" id="nutri_irenal" role="tabpanel" aria-labelledby="nutri_irenal_tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control Insuficiencia Renal</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Creatinina</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso actual</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="" id="">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión N°</label>
                                                                    <input type="text" class="form-control form-control-sm" name="num_sesion" id="num_sesion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo en</label>
                                                                    <input type="text" class="form-control form-control-sm" name="trabajo_en" id="trabajo_en">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text" class="form-control form-control-sm" name="colaboracion" id="colaboracion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="ob_log" id="ob_log">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm"> Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_res_trat" id="com_res_trat"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Comentario de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_sesion" id="com_sesion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--HIPERURICEMIA-->
                                    <div class="tab-pane fade show" id="nutri_hiperuric" role="tabpanel" aria-labelledby="nutri_hiperuric_tab">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <h6 class="tit-gen form_fono d-inline ">Control HIPERURICEMIA</h6>
                                                    <h6 class="tit-gen d-inline float-right">
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="card-informacion">
                                                        <div class="card-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Ac Úrico</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Peso actual</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Variación</label>
                                                                    <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="" id="">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Sesión N°</label>
                                                                    <input type="text" class="form-control form-control-sm" name="num_sesion" id="num_sesion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Trabajo en</label>
                                                                    <input type="text" class="form-control form-control-sm" name="trabajo_en" id="trabajo_en">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Colaboración</label>
                                                                    <input type="text" class="form-control form-control-sm" name="colaboracion" id="colaboracion">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">¿Objetivo logrado?</label>
                                                                    <select class="form-control form-control-sm" name="ob_log" id="ob_log">
                                                                        <option value="AL">Si</option>
                                                                        <option value="LA">No</option>
                                                                        <option value="LA">Parcialmente</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm"> Comentario y respuesta a tratamiento</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_res_trat" id="com_res_trat"></textarea>
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <label class="floating-label-activo-sm">Comentario de la sesión</label>
                                                                    <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="com_sesion" id="com_sesion"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                                    <button type="button" class="btn btn-info"><i class="feather icon-save"></i> Guardar control</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--HISTORICO CONTROLES ATENCIÓN -->
                    <div class="tab-pane fade" id="h_control" role="tabpanel" aria-labelledby="h_control-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <h6 class="text-c-blue f-20">Historial de controles</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <div class="card-informacion">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div style="overflow-x:auto;">
                                                    <table id="atenciones_previas" class="display table dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">Fecha</th>
                                                                <th class="text-center align-middle">Sesion N°</th>
                                                                <th class="text-center align-middle">S. Faltantes</th>
                                                                <th class="text-center align-middle">Trabajo en</th>
                                                                <th class="text-center align-middle">¿Objetivo Logrado?</th>
                                                                <th class="text-center align-middle">Trab. En:</th>
                                                                <th class="text-center align-middle">Ver doc</th>

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
                                                                    <!-- <button type="button" class="btn btn-danger btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="ver examenes" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-edit"></i></button>-->
                                                                    <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                                                    <!--<button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="ver archivos" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif> <i class="feather icon-edit"></i> </button>-->
                                                                    <a class="badge badge-light-purple" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</a>
                                                                    {{--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant">  --}}
                                                                    <!--<button type="button" style="border-radius: 15px;" class="btn btn-info btn-sm"  @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>-->
                                                                    <a class="badge badge-light-info" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</a>
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
                                                                    <!-- <button type="button" class="btn btn-danger btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="ver examenes" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-edit"></i></button>-->
                                                                    <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                                                    <!--<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="ver archivos" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif> <i class="feather icon-edit"></i> </button>-->
                                                                    <a class="badge badge-light-purple" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</a>
                                                                    {{--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant">  --}}
                                                                    <!--<button type="button" style="border-radius: 15px;" class="btn btn-info btn-sm"  @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>-->
                                                                    <a class="badge badge-light-info" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</a>
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
<script>
    	/** MENSAJE*/
            /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es  opcional.');
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

 <!--ALERTA DE ATENCION-->
    <script>
    window.setTimeout(function() {
        $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
            $(this).remove(); 
        });
    }, 5000);
@endsection



