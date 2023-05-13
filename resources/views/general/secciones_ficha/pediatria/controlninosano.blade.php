<div class="tab-pane fade" id="ns" role="tabpanel" aria-labelledby="ns-tab">
    <div class="row">
        <div class="col-sm-12 col-md-12 ">
         <div class="card">
               <div class="card-body pt-3 pb-2">
                    <h5  class="text-c-blue">Control de Niño Sano</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <div class="card">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <button class="btn nav-link-pill active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Embarazo parto y puerperio</button>
                  <button class="btn nav-link-pill" id="nsdos-tab" data-toggle="pill" data-target="#nsdos" type="button" role="tab" aria-controls="nsdos" aria-selected="false">0 a 7 días</button>
                  <button class="btn nav-link-pill" id="nstres-tab" data-toggle="pill" data-target="#nstres" type="button" role="tab" aria-controls="nstres" aria-selected="false">1 mes</button>
                  <button class="btn nav-link-pill" id="nscuatro-tab" data-toggle="pill" data-target="#nscuatro" type="button" role="tab" aria-controls="nscuatro" aria-selected="false">2 a 5 meses</button>
                  <button class="btn nav-link-pill" id="v-pinscinco" data-toggle="pill" data-target="#nscinco" type="button" role="tab" aria-controls="nscinco" aria-selected="false">6 a 11 meses</button>
                  <button class="btn nav-link-pill" id="nsseis-tab" data-toggle="pill" data-target="#nsseis" type="button" role="tab" aria-controls="nsseis" aria-selected="false">12 a 23 meses</button>
                  <button class="btn nav-link-pill" id="nssiete-tab" data-toggle="pill" data-target="#nssiete" type="button" role="tab" aria-controls="nssiete" aria-selected="false">2 a 4 años</button>
                  <button class="btn nav-link-pill" id="nsocho-tab" data-toggle="pill" data-target="#nsocho" type="button" role="tab" aria-controls="nsocho" aria-selected="false">6 a 5 meses</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h5 class="f-16 text-c-blue">Embarazo parto y puerperio</h5>
                            <hr>
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="em-partpuer-tab" data-toggle="tab" href="#em-partpuer" role="tab" aria-controls="em-partpuer" aria-selected="true">Info. embarazo puerperio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="nacido-partpuer-tab" data-toggle="tab" href="#nacido-partpuer" role="tab" aria-controls="nacido-partpuer" aria-selected="true">Datos del recien nacido</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="vac-partpuer-tab" data-toggle="tab" href="#vac-partpuer" role="tab" aria-controls="vac-partpuer" aria-selected="false">Vacunas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="ex-tam-partpuer-tab" data-toggle="tab" href="#ex-tam-partpuer" role="tab" aria-controls="ex-tam-partpuer" aria-selected="false">Examenes y tamizaje</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="ev-nutricional">
                                <!--INFO. EMBARAZO PUERPERIO-->
                                <div class="tab-pane fade show active" id="em-partpuer" role="tabpanel" aria-labelledby="em-partpuer-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 mb-3">Info. Embarazo y puerperio</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Clínica / Hospital</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_nombre_centro" id="ficha_neo_nombre_centro">
                                            <input type="hidden" class="form-control form-control-sm" name="ficha_neo_id_institucion" id="ficha_neo_id_institucion">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Patología del embarazo</label>
                                            <input type="text" class="form-control form-control-sm" name="p_pat_embarazo" id="p_pat_embarazo"><!-- protocolo - diagnostico_preoperatorio -->
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Embarazo controlado</label>
                                            <input type="text" class="form-control form-control-sm" name="p_cont_emb" id="p_cont_emb"> <!-- protocolo - tipo_embarazo -->
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Tipo de parto</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_tipo_procedimiento" id="ficha_neo_tipo_procedimiento">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Inscripción en Registro Civil</label>
                                            <input type="text" class="form-control form-control-sm" name="p_insc" id="p_insc">
                                            <input type="hidden" class="form-control form-control-sm" name="ficha_neo_id_infante" id="ficha_neo_id_infante">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Nombre Neonatólogo <i>(Recibe bebé)</i></label>
                                            <input type="text" class="form-control form-control-sm" name="p_nombre_neonatologo" id="p_nombre_neonatologo">
                                            <input type="hidden" class="form-control form-control-sm" name="p_id_neonatologo" id="p_id_neonatologo">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Nombre Obstétra <i>(Opera)</i></label>
                                            <input type="text" class="form-control form-control-sm" name="p_nombre_obstetra" id="p_nombre_obstetra">
                                            <input type="hidden" class="form-control form-control-sm" name="p_id_profesional" id="p_id_profesional">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Matrona</label>
                                            <input type="text" class="form-control form-control-sm" name="p_matron" id="p_matron">
                                        </div>
                                        {{-- <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="p_otros_parto" id="p_otros_parto">
                                        </div> --}}
                                    </div>
                                </div>
                                <!--DATOS DEL RECIEN NACIDO-->
                                <div class="tab-pane fade show" id="nacido-partpuer" role="tabpanel" aria-labelledby="nacido-partpuer-tab">
                                   <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 mb-3">Datos del recien nacido</h6>
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label-activo-sm">Numero de Brazalete</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_codigo_brazalete" id="ficha_neo_codigo_brazalete">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_sexo_nacimiento" id="ficha_neo_sexo_nacimiento">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="ficha_neo_fecha_nacimiento" id="ficha_neo_fecha_nacimiento">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label-activo-sm">Hora</label>
                                            <input type="time" class="form-control form-control-sm" name="ficha_neo_hora_nacimiento" id="ficha_neo_hora_nacimiento">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Peso (kg.)</label>
                                            <input type="number" class="form-control form-control-sm" name="ficha_neo_peso_nacimiento" id="ficha_neo_peso_nacimiento">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Talla (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="ficha_neo_talla_nacimiento" id="ficha_neo_talla_nacimiento">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Perimetro cefálico (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="ficha_neo_perimetro_cefalico" id="ficha_neo_perimetro_cefalico">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">APGAR min</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_apgar" id="ficha_neo_apgar">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">APGAR 5 min</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_apgar_cinco" id="ficha_neo_apgar_cinco">
                                        </div>
                                        <div class="form-group col-sm-3 col-md-3">
                                            <label class="floating-label">Edad gestacional</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_edad_gestacional" id="ficha_neo_edad_gestacional">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Reanimación</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_reanimacion" id="ficha_neo_reanimacion">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Diagnóstico</label>
                                            <input class="form-control form-control-sm" name="ficha_neo_diag" id="ficha_neo_diag" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Pronóstico</label>
                                            <input class="form-control form-control-sm" name="ficha_neo_pronostico" id="ficha_neo_pronostico" value="">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Sueros y medicamentos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ficha_neo_medicamentos" id="ficha_neo_medicamentos"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Observaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ficha_neo_obs" id="ficha_neo_obs"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--VACUNAS-->
                                <div class="tab-pane fade show" id="vac-partpuer" role="tabpanel" aria-labelledby="vac-partpuer-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 mb-3">Vacunas</h6>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">BCG</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_bcg" id="ficha_neo_bcg">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Hepatitis B</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_hepatitis_b" id="ficha_neo_hepatitis_b">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Otra</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ficha_neo_otras_vacunas" id="ficha_neo_otras_vacunas"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMENES Y TAMIZAJE-->
                                <div class="tab-pane fade show" id="ex-tam-partpuer" role="tabpanel" aria-labelledby="ex-tam-partpuer-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 mb-3">Examenes y tamizaje</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">TSH</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_tsh" id="ficha_neo_tsh">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Evaluación auditiva</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ficha_neo_eval_audit" id="ficha_neo_eval_audit"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">PKU</label>
                                            <input type="text" class="form-control form-control-sm" name="ficha_neo_pku" id="ficha_neo_pku">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ficha_neo_otros_ex" id="ficha_neo_otros_ex"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nsdos" role="tabpanel" aria-labelledby="nsdos-tab">
                            <h5 class="f-16 text-c-blue">0 a 7 dias</h5>
                            <hr>
                            <ul class="nav nav-tabs-aten nav-fill mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-07-tab" data-toggle="tab" href="#ficha-tipo-ns-07" role="tab" aria-controls="ficha-tipo-ns-07" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="pa-gen-ns-07-tab" data-toggle="tab" href="#pa-gen-ns-07" role="tab" aria-controls="pa-gen-ns-07" aria-selected="false">Parametros generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="est-fisica-ns-07-tab" data-toggle="tab" href="#est-fisica-ns-07" role="tab" aria-controls="est-fisica-ns-07" aria-selected="false">Estado fisico del menor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="antropometria-ns-07-tab" data-toggle="tab" href="#antropometria-ns-07" role="tab" aria-controls="antropometria-ns-07" aria-selected="false">Antropometría</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="sal-mat-ns-07-tab" data-toggle="tab" href="#sal-mat-ns-07" role="tab" aria-control="sal-mat-ns-07" aria-selected="false">Estado de salud materno</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="lac-mat-ns-07-tab" data-toggle="tab" href="#lac-mat-ns-07" role="tab" aria-control="lac-mat-ns-07" aria-selected="false">Lactancia materna</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="diagnos-ns-07-tab" data-toggle="tab" href="#diagnos-ns-07" role="tab" aria-control="diagnos-ns-07" aria-selected="false">Diagnósticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-ns-07-tab" data-toggle="tab" href="#indicaciones-ns-07" role="tab" aria-control="indicaciones-ns-07" aria-selected="false">Indicaciones y prox. control</a>
                                </li>
                            </ul>
                            <div class="tab-content" >
                                <!--FICHA TIPO-->
                                <div class="tab-pane fade show active" id="ficha-tipo-ns-07" role="tabpanel" aria-labelledby="ficha-tipo-ns-07-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                                <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            Resultado
                                        </div>
                                    </div>
                                </div>
                                <!--PARAMETROS GENERALES-->
                                <div class="tab-pane fade show" id="pa-gen-ns-07" role="tabpanel" aria-labelledby="pa-gen-ns-07-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Parámetros generales</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                            <label class="floating-label">Anamnesis</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07anamnesis" name="p_07anamnesis"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Exper.Embarazo gral.</label>
                                                <select name="p_07_p_puerp" data-titulo="Experiencia_parto" id="p_07_p_puerp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_puerp','div_p_07_p_puerp','obs_p_07_p_puerp',2);">
                                                    <option selected value="1">Normal y Felíz</option>
                                                    <option value="2">Anormal</option>
                                                    <option value="3">No Realizada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_p_puerp" style="display:none">
                                                <label class="floating-label-activo-sm">Experiencia del embarazo parto y puerperio <i>(describir)</i></label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_puerp" id="obs_p_07_p_puerp"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Est. Emoc.redes </label>
                                                <select name="p_07_p" id="p_07_p" data-titulo="Emoción"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p','div_p_07_p','obs_p_07_p',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_p" style="display:none">
                                                <label class="floating-label-activo-sm">Estado emocional familiar <i>(describir)</i></label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Emoción" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p" id="obs_p_07_p"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Lactancia </label>
                                                <select name="p_07_p_lactancia" id="p_07_p_lactancia" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_lactancia','div_p_07_p_lactancia','obs_p_07_p_lactancia',2);">
                                                    <option selected value="1">Normal e Informada</option>
                                                    <option value="2">Anormal</option>
                                                    <option value="3">No Examinada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_p_lactancia" style="display:none">
                                                <label class="floating-label-activo-sm">Lactancia <i>(describir)</i></label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_lactancia" id="obs_p_07_p_lactancia"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ant. heredo-fam. Mat.</label>
                                                <select name="p_07_p_ant_mat" id="p_07_p_ant_mat" data-titulo="Antec_mat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_mat','div_p_07_p_ant_mat','obs_p_07_p_ant_mat',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_p_ant_mat" style="display:none">
                                                <label class="floating-label-activo-sm">Ant. heredo-fam. Mat. <i>(describir)</i></label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_ant_mat" id="obs_p_07_p_ant_mat"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ant. heredo-fam. Pat.</label>
                                                <select name="p_07_p_ant_pat" id="p_07_p_ant_pat" data-titulo="Antec_pat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ant_pat','div_p_07_p_ant_pat','obs_p_07_p_ant_pat',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si</option>
                                                    <option value="3">No Informada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_p_ant_pat" style="display:none">
                                                <label class="floating-label-activo-sm">Ant. heredo-fam. Pat. <i>(describir)</i></label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Antec_pat" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_ant_pat" id="obs_p_07_p_ant_pat"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ESTADO FISICO MENOR-->
                                <div class="tab-pane fade show" id="est-fisica-ns-07" role="tabpanel" aria-labelledby="est-fisica-ns-07-tab">
                                    <div class="form-row" ID="EX_07">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Examen físico del menor</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="floating-label">Inspección general</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07insp" name="p_07insp" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Actividad</label>
                                                        <select name="p_07_p_rnact" data-titulo="Actividad" id="p_07_p_rnact" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_rnact','div_p_07_p_rnact','obs_p_07_p_rnact',2);">
                                                            <option value="0">Seleccione</option>
                                                            <option selected value="1">Normal y Felíz</option>
                                                            <option value="2">Anormal</option>
                                                            <option value="3">No Realizada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_rnact" style="display:none">
                                                        <label class="floating-label-activo-sm">Actividad</label>
                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Experiencia_parto" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_rnact" id="obs_p_07_p_rnact"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Malformaciones</label>
                                                        <select name="p_07_malf" id="p_07_malf" data-titulo="Malf"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_malf','div_p_07_malf','obs_p_07_malf',2);">
                                                            <option selected value="1">No</option>
                                                            <option value="2">Si</option>
                                                            <option value="3">No Informadas</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_malf" style="display:none">
                                                        <label class="floating-label-activo-sm">Malformaciones</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Malf" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_malf" id="obs_p_07_malf"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tono y Postura </label>
                                                        <select name="p_07_p_tp" id="p_07_p_tp" data-titulo="Tono"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tp','div_p_07_p_tp','obs_p_07_p_tp',2);">
                                                            <option selected value="1">Normal </option>
                                                            <option value="2">Alterada</option>
                                                            <option value="3">No Informada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_tp" style="display:none">
                                                        <label class="floating-label-activo-sm">Tono y Postura</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Tono" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_tp" id="obs_p_07_p_tp"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Piél</label>
                                                        <select name="p_07_p_piel" id="p_07_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_piel','div_p_07_p_piel','obs_p_07_p_piel',2);">
                                                            <option selected value="1">Normal </option>
                                                            <option value="2">Anormal</option>
                                                            <option value="3">No Informado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_piel" style="display:none">
                                                        <label class="floating-label-activo-sm">Examen de Piél </label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_piel" id="obs_p_07_p_piel"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                        <select name="p_07_p_ojo" id="p_07_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ojo','div_p_07_p_ojo','obs_p_07_p_ojo',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_ojo" style="display:none">
                                                        <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ojo" id="obs_p_07_p_ojo"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ex Buco-dental</label>
                                                        <select name="p_07_p_dental" id="p_07_p_dental" data-titulo="Dental"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_dental','div_p_07_p_dental','obs_p_07_p_dental',2);">
                                                            <option selected value="1">Normal </option>
                                                            <option value="2">Anormal</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_dental" style="display:none">
                                                        <label class="floating-label-activo-sm">Ex Buco-dental</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_dental" id="obs_p_07_p_dental"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label">Cabeza y Cuello</label>
                                                        <select name="p_07_p_ccuello" data-titulo="Cab_cuello" id="p_07_p_ccuello" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ccuello','div_p_07_p_ccuello','obs_p_07_p_ccuello',2);">
                                                            <option selected value="1">Normal </option>
                                                            <option value="2">Anormal</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_ccuello" style="display:none">
                                                        <label class="floating-label">Cabeza y Cuello</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Cab_cuello" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ccuello" id="obs_p_07_p_ccuello"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Cordón</label>
                                                        <select name="p_07_pcordon" id="p_07_pcordon" data-titulo="Cordon"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_pcordon','div_p_07_pcordon','obs_p_07_pcordon',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Anormal</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_pcordon" style="display:none">
                                                        <label class="floating-label-activo-sm">Cordón</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Cordon" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_pcordon" id="obs_p_07_pcordon"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Tórax</label>
                                                        <select name="p_07_p_torax" id="p_07_p_torax" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_torax','div_p_07_p_torax','obs_p_07_p_torax',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_torax" style="display:none">
                                                        <label class="floating-label-activo-sm">Tórax</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_torax" id="obs_p_07_p_torax"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Abdomen</label>
                                                        <select name="p_07_p_abd" id="p_07_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_abd','div_p_07_p_abd','obs_p_07_p_abd',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_abd" style="display:none">
                                                        <label class="floating-label-activo-sm">Abdomen</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_abda" id="obs_p_07_p_abd"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Columna</label>
                                                        <select name="p_07_p_col" id="p_07_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_col','div_p_07_p_col','obs_p_07_p_col',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterada</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_col" style="display:none">
                                                        <label class="floating-label-activo-sm">Columna</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_col" id="obs_p_07_p_col"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Extremidades</label>
                                                        <select name="p_07_p_ext" id="p_07_p_ext" data-titulo="Extrem"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_ext','div_p_07_p_ext','obs_p_07_p_ext',2);">
                                                            <option selected value="1">Normales</option>
                                                            <option value="2">Alteradas</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_ext" style="display:none">
                                                        <label class="floating-label-activo-sm">Extremidades</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Extrem" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_ext" id="obs_p_07_p_ext"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Genitales-ano</label>
                                                        <select name="p_07_p_gen" id="p_07_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_gen','div_p_07_p_gen','obs_p_07_p_gen',2);">
                                                            <option selected value="1">Normales</option>
                                                            <option value="2">Anormales</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_gen" style="display:none;">
                                                        <label class="floating-label-activo-sm">Genitales</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_gen" id="obs_p_07_p_gen"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Ex. Neurológico (reflejos)</label>
                                                        <select name="p_07_p_neuro" id="p_07_p_neuro" data-titulo="Neuro"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_neuro','div_p_07_p_neuro','obs_p_07_p_neuro',2);">
                                                            <option selected value="1">Normal</option>
                                                            <option value="2">Alterado</option>
                                                            <option value="3">No Realizado</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_p_07_p_neuro" style="display:none;">
                                                        <label class="floating-label-activo-sm">Ex Neurológico</label>
                                                        <textarea class="form-control form-control-sm"  data-titulo="Neuro" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_07_p_neuro" id="obs_p_07_p_neuro"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ANTROPOMETRÍA-->
                                <div class="tab-pane fade show" id="antropometria-ns-07" role="tabpanel" aria-labelledby="antropometria-ns-07-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Peso (kg.)</label>
                                            <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Longitud</label>
                                            <input type="number" class="form-control form-control-sm" name="p_07_matlong_var" id="p_07_matlong_var">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Perímetro cefálico</label>
                                            <input type="number" class="form-control form-control-sm" name="p_07_perim" id="p_07_perim">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_07_otros" name="p_07_otros" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--ESTADO DE SALUD MATERNO-->
                                <div class="tab-pane fade show" id="sal-mat-ns-07" role="tabpanel" aria-labelledby="sal-mat-ns-07-tab">
                                    <div class="form-row">
                                         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Estado de salud materno</h6>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Signos vitales</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_sv" name="p_07_sv"></textarea>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Peso (kg.)</label>
                                            <input type="number" class="form-control form-control-sm" name="p_07_matpeso" id="p_07_matpeso">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Variación (kg.)</label>
                                            <input type="number" class="form-control form-control-sm" name="p_07_matpeso_var" id="p_07_matpeso_var">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Involución uterina</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_utero" name="p_07_mat_utero" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Hda. Operatoria</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_heridaop" name="p_07_mat_heridaop" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Zona genito-anal</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ga" name="p_07_mat_ga" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Extremidades inferiores (edemas)</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" id="p_07_mat_ext" name="p_07_mat_ext" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--LACTANCIA MATERNA-->
                                <div class="tab-pane fade show" id="lac-mat-ns-07" role="tabpanel" aria-labelledby="lac-mat-ns-07-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Lactancia materna</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Lactancia en general</label>
                                                <select name="p_07_mat_lact" id="p_07_mat_lact" data-titulo="Lactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lact','div_p_07_mat_lact','obs_p_07_mat_lact',2);">
                                                    <option selected value="1">Normal e Informada</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Examinada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_mat_lact" style="display:none;">
                                                <label class="floating-label-activo-sm">Ex. mamas</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Lactancia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_mat_lact" id="obs_p_07_mat_lact"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Técnica</label>
                                                <select name="p_07_p_tlactancia" id="p_07_p_tlactancia" data-titulo="TLactancia"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_p_tlactancia','div_p_07_p_tlactancia','obs_p_07_p_tlactancia',2);">
                                                    <option selected value="1">Informada</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Examinada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_p_tlactancia" style="display:none;">
                                                <label class="floating-label-activo-sm">Técnica</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="TLactancia" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_p_tlactancia" id="obs_p_07_p_tlactancia"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex. mamas</label>
                                                <select name="p_07_mat_lactmamas" id="p_07_mat_lactmamas" data-titulo="ex_mamas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_07_mat_lactmamas','div_p_07_mat_lactmamas','obs_p_07_mat_lactmamas',2);">
                                                    <option selected value="1">Normales</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Examinadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_07_mat_lactmamas" style="display:none;">
                                                <label class="floating-label-activo-sm">Ex. mamas</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="ex_mamas" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_07_mat_lactmamas" id="obs_p_07_mat_lactmamas"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!--DIAGNÓSTICOS-->
                                <div class="tab-pane fade show" id="diagnos-ns-07" role="tabpanel" aria-labelledby="diagnos-ns-07-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Diagnósticos</h6>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">General</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Incremento ponderal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Lactancia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud del lactante</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud de la madre</label>
                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud psicosocial</label>
                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES Y PROX. CONTROL-->
                                <div class="tab-pane fade show" id="indicaciones-ns-07" role="tabpanel" aria-labelledby="indicaciones-ns-07-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="p_07_fecha_proxcontrol" id="p_07_fecha_proxcontrol">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Control con:</label>
                                            <input type="text" class="form-control form-control-sm" name="p_07_control_con" id="p_07_control_con">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Indicaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_07_ind" id="p_07_ind"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Sugerencias</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_sugerencias" id="p_07_sugerencias"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nstres" role="tabpanel" aria-labelledby="nstres-tab">
                        <h5 class="f-16 text-c-blue">1 mes</h5>
                        <hr>
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-01m" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-1m-tab" data-toggle="tab" href="#ficha-tipo-ns-1m" role="tab" aria-controls="ficha-tipo-ns-1m" aria-selected="true">Ficha tipo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pa-gen-ns-01m-tab" data-toggle="tab" href="#pa-gen-ns-1m" role="tab" aria-controls="pa-gen-ns-01m" aria-selected="false">Parametros generales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="est-fisica-ns-1m-tab" data-toggle="tab" href="#est-fisica-ns-1m" role="tab" aria-controls="est-fisica-ns-1m" aria-selected="false">Estado fisico del menor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="antropometria-ns-1m-tab" data-toggle="tab" href="#antropometria-ns-1m" role="tab" aria-controls="antropometria-ns-1m" aria-selected="false">Antropometría</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="lac-mat-ns-1m-tab" data-toggle="tab" href="#lac-mat-ns-1m" role="tab" aria-control="lac-mat-ns-1m" aria-selected="false">Lactancia materna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="diagnos-ns-1m-tab" data-toggle="tab" href="#diagnos-ns-1m" role="tab" aria-control="diagnos-ns-1m" aria-selected="false">Diagnósticos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="indicaciones-ns-1m-tab" data-toggle="tab" href="#indicaciones-ns-1m" role="tab" aria-control="indicaciones-ns-1m" aria-selected="false">Indicaciones y próximo  control</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="ns-1m">
                            <!--FICHA TIPO-->
                            <div class="tab-pane fade show active" id="ficha-tipo-ns-1m" role="tabpanel" aria-labelledby="ficha-tipo-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        Resultado
                                    </div>
                                </div>
                            </div>
                            <!--PARAMETROS GENERALES-->
                            <div class="tab-pane fade show" id="pa-gen-ns-1m" role="tabpanel" aria-labelledby="pa-gen-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Parametros generales</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Anamnesis</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_1anamnesis" name="p_1anamnesis" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Relaciones Fam</label>
                                            <select name="p_1_p_relfam" data-titulo="Relaciones_fam" id="p_1_p_relfam" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_relfam','div_p_1_relfam','obs_p_1_prelfam',2);">
                                                <option selected value="1">Normal y Feliz</option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Realizada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_relfam" style="display:none">
                                            <label class="floating-label-activo-sm">Relaciones Fam</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Relaciones_fam" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_relfam" id="obs_p_1_prelfam"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ESTADO FISICO DEL MENOR-->
                            <div class="tab-pane fade show" id="est-fisica-ns-1m" role="tabpanel" aria-labelledby="est-fisica-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Estado físico del menor</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Inspección general</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_07insp" name="p_07insp" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Piél</label>
                                            <select name="p_1_p_piel" id="p_1_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_piel','div_p_1_p_piel','obs_p_1_p_piel',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_piel" style="display:none">
                                            <label class="floating-label-activo-sm">Examen de Piél </label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_piel" id="obs_p_1_p_piel"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ganglios</label>
                                            <select name="p_1_ganglios" id="p_1_ganglios" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_ganglios','div_p_1_ganglios','obs_p_1_ganglios',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Anormales</option>
                                                <option value="3">No Examinados</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_ganglios" style="display:none">
                                            <label class="floating-label-activo-sm">Ganglios</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_ganglios" id="obs_p_1_ganglios"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cardio_pulmonar</label>
                                            <select name="p_1_p_cpulm" data-titulo="Cardio_pulm" id="p_1_p_cpulm" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_cpulm','div_p_1_p_cpulm','obs_p_1_p_cpulm',2);">
                                                <option value="0">Seleccione</option>
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_cpulm" style="display:none">
                                            <label class="floating-label-activo-sm">Cardio_pulmonar</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Cardio_pulm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_cpulm" id="obs_p_1_p_cpulm"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Abdomen</label>
                                            <select name="p_1_p_abd" id="p_1_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_abd','div_p_1_p_abd','obs_p_1_p_abd',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_abd" style="display:none">
                                            <label class="floating-label-activo-sm">Abdomen</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_abd" id="obs_p_1_p_abd"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex.Genito-anal</label>
                                            <select name="p_1_exganal" id="p_1_exganal" data-titulo="Ex.Genito-anal"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_exganal','div_p_1_exganal','obs_p_1_exganal',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_exganal" style="display:none">
                                            <label class="floating-label-activo-sm">Ex.Genito-anal</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Ex.Genito-anal" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_exganal" id="obs_p_1_exganal"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Reflejos </label>
                                            <select name="p_1_p_ref" id="p_1_p_ref" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ref','div_p_1_p_ref','obs_p_1_p_ref',2);">
                                                <option selected value="1">Normales </option>
                                                <option value="2">Alterados</option>
                                                <option value="3">No Realizados</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_ref" style="display:none">
                                            <label class="floating-label-activo-sm">Reflejos</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ref" id="obs_p_1_p_ref"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Motilidad</label>
                                            <select name="p_1_p_mot" id="p_1_p_mot" data-titulo="Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_mot','div_p_1_p_mot','obs_p_1_p_mot',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_mot" style="display:none">
                                            <label class="floating-label-activo-sm">Examen de Motilidad </label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Motilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_mot" id="obs_p_1_p_mot"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tono Axilar</label>
                                            <select name="p_1_tonoaxil" id="p_1_tonoaxil" data-titulo="Tono Axilar"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_tonoaxil','div_p_1_tonoaxil','obs_p_1_tonoaxil',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_tonoaxil" style="display:none">
                                            <label class="floating-label-activo-sm">Tono Axilar</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Tono Axilar" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_tonoaxil" id="obs_p_1_tonoaxil"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Signos Par.Cer</label>
                                            <select name="p_1_p_paralisis" data-titulo="Signos Par.Cer" id="p_1_p_paralisis" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_paralisis','div_p_1_p_paralisis','obs_p_1_p_paralisis',2);">
                                                <option value="0">Seleccione</option>
                                                <option selected value="1">No</option>
                                                <option value="2">Si</option>
                                                <option value="3">No Evaluado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_paralisis" style="display:none">
                                            <label class="floating-label-activo-sm">Signos Par.Cer</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Signos Par.Cer" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_paralisis" id="obs_p_1_p_paralisis"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Columna</label>
                                            <select name="p_1_p_col" id="p_1_p_col" data-titulo="Columna"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_col','div_p_1_p_col','obs_p_1_p_col',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_col" style="display:none">
                                            <label class="floating-label-activo-sm">Columna</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Columna" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_col" id="obs_p_1_p_col"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Caderas</label>
                                            <select name="p_1_cadera" id="p_1_cadera" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_cadera','div_p_1_cadera','obs_p_1_cadera',2);">
                                                <option selected value="1">Normales </option>
                                                <option value="2">Alteradas</option>
                                                <option value="3">No Examinadas</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_cadera" style="display:none">
                                            <label class="floating-label-activo-sm">Caderas</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_cadera" id="obs_p_1_cadera"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Extremidades</label>
                                            <select name="p_1_p_ext" id="p_1_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ext','div_p_1_p_ext','obs_p_1_p_ext',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alteradas</option>
                                                <option value="3">No Examinadas</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_ext" style="display:none">
                                            <label class="floating-label-activo-sm">Extremidades</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ext" id="obs_p_1_p_ext"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Oftalmología</label>
                                            <select name="p_1_p_ojo" id="p_1_p_ojo" data-titulo="Oftalmología"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_ojo','div_p_1_p_ojo','obs_p_1_p_ojo',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_ojo" style="display:none">
                                            <label class="floating-label-activo-sm">Oftalmología</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Oftalmología" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_ojo" id="obs_p_1_p_ojo"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Audición</label>
                                            <select name="p_1_audio" id="p_1_audio" data-titulo="Audición"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_audio','div_p_1_audio','obs_p_1_audio',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Anormal</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_audio" style="display:none">
                                            <label class="floating-label-activo-sm">Audición</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_audio" id="obs_p_1_audio"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Buco-Dental</label>
                                            <select name="p_1_p_bd" data-titulo="Buco-Dental" id="p_1_p_bd" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1_p_bd','div_p_1_p_bd','obs_p_1_p_bd',2);">
                                                <option value="0">Seleccione</option>
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_1_p_bd" style="display:none">
                                            <label class="floating-label-activo-sm">Buco-Dental</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Buco-Dental" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_1_p_bd" id="obs_p_1_p_bd"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 mx-auto">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ANTROPOMETRÍA-->
                            <div class="tab-pane fade show" id="antropometria-ns-1m" role="tabpanel" aria-labelledby="antropometria-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Peso en (gr.)</label>
                                        <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Longitud (cm.)</label>
                                        <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Perímetro cefálico (cm.)</label>
                                        <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Cefalohematomas Fontanella ant.</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--LACTANCIA MATERNA-->
                            <div class="tab-pane fade show" id="lac-mat-ns-1m" role="tabpanel" aria-labelledby="llac-mat-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Lactancia materna</h6>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">General</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="lac_general" name="lac_general" ></textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Técnica</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tec" name="tec" ></textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Ex. Mamas</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="mamas" name="mamas" ></textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Señales de maltrato</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                    </div>
                                </div>
                            </div>
                             <!--DIAGNÓSTICOS-->
                            <div class="tab-pane fade show" id="diagnos-ns-1m" role="tabpanel" aria-labelledby="diagnos-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Diangósticos</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">General</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Incremento ponderal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Nutricional</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Salud del lactante</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Salud de la madre</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_madre" id="sal_madre"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Salud psicosocial</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--INDICACIONES Y PROX. CONTROL-->
                            <div class="tab-pane fade show" id="indicaciones-ns-1m" role="tabpanel" aria-labelledby="indicaciones-ns-1m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="p_07_fecha_proxcontrol" id="p_07_fecha_proxcontrol">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Control con</label>
                                        <input type="text" class="form-control form-control-sm" name="p_07_control_con" id="p_07_control_con">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_ind" id="p_07_ind"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="floating-label">Sugerencias</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_sugerencias" id="p_07_sugerencias"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nscuatro" role="tabpanel" aria-labelledby="nscuatro-tab">
                        <h5 class="f-16 text-c-blue">2 a 5 meses</h5>
                        <hr>
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-25m" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-25m-tab" data-toggle="tab" href="#ficha-tipo-ns-25m" role="tab" aria-controls="ficha-tipo-ns-25m" aria-selected="true">Ficha tipo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pa-gen-ns-25m-tab" data-toggle="tab" href="#pa-gen-ns-25m" role="tab" aria-controls="pa-gen-ns-25m" aria-selected="false">Parametros generales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="est-fisica-ns-25m-tab" data-toggle="tab" href="#est-fisica-ns-25m" role="tab" aria-controls="est-fisica-ns-25m" aria-selected="false">Estado fisico del menor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="antropometria-ns-25m-tab" data-toggle="tab" href="#antropometria-ns-25m" role="tab" aria-controls="antropometria-ns-25m" aria-selected="false">Antropometría</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="diagnos-ns-25m-tab" data-toggle="tab" href="#diagnos-ns-25m" role="tab" aria-control="diagnos-ns-25m" aria-selected="false">Diagnósticos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="indicaciones-ns-25m-tab" data-toggle="tab" href="#indicaciones-ns-25m" role="tab" aria-control="indicaciones-ns-25m" aria-selected="false">Indicaciones y próximo control</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="ns-25">
                            <!--FICHA TIPO-->
                            <div class="tab-pane fade show active" id="ficha-tipo-ns-25m" role="tabpanel" aria-labelledby="ficha-tipo-ns-25-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                        <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        Resultado
                                    </div>
                                </div>
                            </div>
                            <!--PARAMETROS GENERALES-->
                            <div class="tab-pane fade show" id="pa-gen-ns-25m" role="tabpanel" aria-labelledby="pa-gen-ns-25m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <h6 class="f-16 text-c-blue mb-3">Control parámetros generales</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Anamnesis</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_25anamnesis" name="p_25anamnesis"></textarea>
                                        </div>
                                   </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ant. heredo-fam. Mat.</label>
                                            <select name="p_25_p_ant_mat" id="p_25_p_ant_mat" data-titulo="Antec_mat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_ant_mat','div_p_25_p_ant_mat','obs_p_25_p_ant_mat',2);">
                                                <option selected value="1">No</option>
                                                <option value="2">Si</option>
                                                <option value="3">No Informada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_ant_mat" style="display:none">
                                            <label class="floating-label-activo-sm">Ant. heredo-fam. Mat.</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_ant_mat" id="obs_p_25_p_ant_mat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ant. heredo-fam. Pat.</label>
                                            <select name="p_25_p_ant_pat" id="p_25_p_ant_pat" data-titulo="Antec_pat"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_ant_pat','div_p_25_p_ant_pat','obs_p_25_p_ant_pat',2);">
                                                <option selected value="1">No</option>
                                                <option value="2">Si</option>
                                                <option value="3">No Informada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_ant_pat" style="display:none">
                                            <label class="floating-label-activo-sm">Ant. heredo-fam. Pat.</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Antec_mat" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_ant_pat" id="obs_p_25_p_ant_pat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Test de Edimburgo</label>
                                            <select name="p25_p_edim" data-titulo="Edimburgo" id="p25_p_edim" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p25_p_edim','div_p25_p_edim','obs_p25_p_edim',2);">
                                                <option selected value="1">Negativo</option>
                                                <option value="2">Positivo</option>
                                                <option value="3">No Realizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p25_p_edim" style="display:none">
                                            <label class="floating-label-activo-sm">Test de Edimburgo</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Edimburgo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p25_p_edim" id="obs_p25_p_edim"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Rx. Caderas </label>
                                            <select name="p_25_rxcad" id="p_25_rxcad" data-titulo="Rx_caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_rxcad','div_p_25_rxcad','obs_p_25_rxcad',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_rxcad" style="display:none">
                                            <label class="floating-label-activo-sm">Rx. Caderas</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Rx_caderas" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_rxcad" id="obs_p_25_rxcad"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Evaluación DSM </label>
                                            <select name="p_25_p_dsm" id="p_25_p_dsm" data-titulo="DSM"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_dsm','div_p_25_p_dsm','obs_p_25_p_dsm',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_dsm" style="display:none">
                                            <label class="floating-label-activo-sm">Evaluación DSM </label>
                                            <textarea class="form-control form-control-sm"  data-titulo="DSM" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_dsm" id="obs_p_25_p_dsm"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ESTADO FISICO-->
                            <div class="tab-pane fade show" id="est-fisica-ns-25m" role="tabpanel" aria-labelledby="est-fisica-ns-25-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Estado físico del menor</h6>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="floating-label">Inspección general y relación parental</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="insp_25_gral" name="insp_25_gral"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Piél</label>
                                            <select name="p_25_p_piel" id="p_25_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_piel','div_p_25_p_piel','obs_p_25_p_piel',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterada</option>
                                                <option value="3">No Examinada</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_piel" style="display:none">
                                            <label class="floating-label-activo-sm">Examen de piél </label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_piel" id="obs_p_25_p_piel"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ganglios</label>
                                            <select name="p_25_p_gang" id="p_25_p_gang" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_gang','div_p_25_p_gang','obs_p_25_p_gang',2);">
                                                <option selected value="1">Normal </option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinados</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_gang" style="display:none">
                                            <label class="floating-label-activo-sm">Examen de Ganglios </label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_gang" id="obs_p_25_p_gang"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Abdomen</label>
                                            <select name="p_25_p_abd" id="p_25_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_abd','div_p_25_p_abd','obs_p_25_p_abd',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_abd" style="display:none">
                                            <label class="floating-label-activo-sm">Abdomen</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_abda" id="obs_p_25_p_abd"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                            <select name="p_25_p_carpul" id="p_25_p_carpul" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_carpul','div_p_25_p_carpul','obs_p_25_p_carpul',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_carpul" style="display:none">
                                            <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_carpul" id="obs_p_25_p_carpul"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Genito-Anal</label>
                                            <select name="p_25_p_gen" id="p_25_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_gen','div_p_25_p_gen','obs_p_25_p_gen',2);">
                                                <option selected value="1">Normales</option>
                                                <option value="2">Alterados</option>
                                                <option value="3">No Examinados</option>
                                            </select>
                                        </div>
                                        <div class="form-group " id="div_p_25_p_gen" style="display:none;">
                                            <label class="floating-label-activo-sm">Genito-Anal</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_gen" id="obs_p_25_p_gen"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Reflejos</label>
                                            <select name="p_25_p_reflex" id="p_25_p_reflex" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_reflex','div_p_25_p_reflex','obs_p_25_p_reflex',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterados</option>
                                                <option value="3">No Examinados</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_reflex" style="display:none;">
                                            <label class="floating-label-activo-sm">Reflejos</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_reflex" id="obs_p_25_p_reflex"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tono y Motilidad</label>
                                            <select name="p_25_p_tono" id="p_25_p_tono" data-titulo="Tono y Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_tono','div_p_25_p_tono','obs_p_25_p_tono',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterados</option>
                                                <option value="3">No Examinados</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_tono" style="display:none;">
                                            <label class="floating-label-activo-sm">Tono y Motilidad</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Tono y Motilidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_tono" id="obs_p_25_p_tono"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Caderas</label>
                                            <select name="p_25_p_cad" id="p_25_p_cad" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_cad','div_p_25_p_cad','obs_p_25_p_cad',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alteradas</option>
                                                <option value="3">No Examinadas</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_cad" style="display:none;">
                                            <label class="floating-label-activo-sm">Caderas</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_cad" id="obs_p_25_p_cad"></textarea>
                                        </div>
                                    </div>
                                     <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Extremidades</label>
                                            <select name="p_25_p_ext" id="p_25_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_ext','div_p_25_p_ext','obs_p_25_p_ext',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alteradas</option>
                                                <option value="3">No Examinadas</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_ext" style="display:none;">
                                            <label class="floating-label-activo-sm">Extremidades</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_ext" id="obs_p_25_p_ext"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                            <select name="p_25_p_ojo" id="p_25_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_ojo','div_p_25_p_ojo','obs_p_25_p_ojo',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_ojo" style="display:none">
                                            <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_ojo" id="obs_p_25_p_ojo"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ex Auditívo</label>
                                            <select name="p_25_p_oido" id="p_25_p_oido" data-titulo="Oidos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_25_p_oido','div_p_25_p_oido','obs_p_25_p_oido',2);">
                                                <option selected value="1">Normal</option>
                                                <option value="2">Alterado</option>
                                                <option value="3">No Examinado</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div_p_25_p_oido" style="display:none">
                                            <label class="floating-label-activo-sm">Ex Auditívo</label>
                                            <textarea class="form-control form-control-sm"  data-titulo="Oidos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_25_p_oido" id="obs_p_25_p_oido"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ANTROPOMETRÍA-->
                            <div class="tab-pane fade show" id="antropometria-ns-25m" role="tabpanel" aria-labelledby="antropometria-ns-25-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Peso en (gr.)</label>
                                        <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Longitud (cm.)</label>
                                        <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Perímetro cefálico (cm.)</label>
                                        <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label">Otros (lesiones)</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="floating-label">Señales de maltrato</label>
                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                    </div>
                                </div>
                            </div>
                             <!--DIAGNÓSTICO-->
                            <div class="tab-pane fade show" id="diagnos-ns-25m" role="tabpanel" aria-labelledby="diagnos-ns-25m-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Diagnóstico</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">General</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Incremento ponderal</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Lactancia</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Salud del lactante</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Otros</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Salud psicosocial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--INDICACIONES Y PROX. CONTROL-->
                            <div class="tab-pane fade show" id="indicaciones-ns-25m" role="tabpanel" aria-labelledby="indicaciones-ns-25m-tab">
                               <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="p_07_fecha_proxcontrol" id="p_07_fecha_proxcontrol">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Control con:</label>
                                        <input type="text" class="form-control form-control-sm" name="p_07_control_con" id="p_07_control_con">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Indicaciones</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_ind" id="p_07_ind"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="floating-label">Sugerencias</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_07_sugerencias" id="p_07_sugerencias"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="nscinco" role="tabpanel" aria-labelledby="nscinco-tab">
                            <h5 class="f-16 text-c-blue">6 a 11 meses</h5>
                            <hr>
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-01m" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-611m-tab" data-toggle="tab" href="#ficha-tipo-ns-611m" role="tab" aria-controls="ficha-tipo-ns-611m" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="pa-gen-ns-611m-tab" data-toggle="tab" href="#pa-gen-ns-611m" role="tab" aria-controls="pa-gen-ns-611m" aria-selected="false">Parametros generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="est-fisica-ns-611m-tab" data-toggle="tab" href="#est-fisica-ns-611m" role="tab" aria-controls="est-fisica-ns-611m" aria-selected="false">Estado fisico del menor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="antropometria-ns-611m-tab" data-toggle="tab" href="#antropometria-ns-611m" role="tab" aria-controls="antropometria-ns-611m" aria-selected="false">Antropometría</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="diagnos-ns-611m-tab" data-toggle="tab" href="#diagnos-ns-611m" role="tab" aria-control="diagnos-ns-611m" aria-selected="false">Diagnósticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-ns-611m-tab" data-toggle="tab" href="#indicaciones-ns-611m" role="tab" aria-control="indicaciones-ns-611m" aria-selected="false">Indicaciones y próx. control</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="ev-nutricional">
                                <!--FICHA TIPO-->
                                <div class="tab-pane fade show active" id="ficha-tipo-ns-611m" role="tabpanel" aria-labelledby="ficha-tipo-ns-611m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            Resultado
                                        </div>
                                    </div>
                                </div>
                                <!--PARAMETROS GENERALES-->
                                <div class="tab-pane fade show" id="pa-gen-ns-611m" role="tabpanel" aria-labelledby="pa-gen-ns-611m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Control parámetros generales</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label class="floating-label">Anamnesis</label>
                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="p_611anamnesis" name="p_611anamnesis" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Test de Edimburgo</label>
                                                <select name="p611_p_edim" data-titulo="Edimburgo" id="p611_p_edim" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p611_p_edim','div_p611_p_edim','obs_p611_p_edim',2);">
                                                    <option selected value="1">Negativo</option>
                                                    <option value="2">Positivo</option>
                                                    <option value="3">No Realizado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p611_p_edim" style="display:none">
                                                <label class="floating-label-activo-sm">Test de Edimburgo</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Edimburgo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p611_p_edim" id="obs_p611_p_edim"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group" id="div_p611_p_otros" >
                                                <label class="floating-label-activo-sm">Otros</label>
                                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="otr_p611_p_otro" id="otr_p611_p_otro"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="prev_acc();"><i class="feather icon-file-text"></i> Pauta prevensión accidentes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Estado físico del menor-->
                                <div class="tab-pane fade show" id="est-fisica-ns-611m" role="tabpanel" aria-labelledby="est-fisica-ns-611m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Estado físico del menor</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Inspección general y relación parental</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="" onblur="this.rows=1;" id="insp_611_gral" name="insp_611_gral" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Piél</label>
                                                <select name="p_25_p_piel" id="p_611_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_piel','div_p_611_p_piel','obs_p_611_p_piel',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_piel" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de Piél </label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_piel" id="obs_p_611_p_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ganglios</label>
                                                <select name="p_611_p_gang" id="p_611_p_gang" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_gang','div_p_611_p_gang','obs_p_611_p_gang',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_gang" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de Ganglios </label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_gang" id="obs_p_611_p_gang"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <select name="p_611_p_carpul" id="p_611_p_carpul" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_carpul','div_p_611_p_carpul','obs_p_611_p_carpul',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_carpul" style="display:none">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_carpul" id="obs_p_611_p_carpul"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <select name="p_611_p_abd" id="p_611_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_abd','div_p_611_p_abd','obs_p_611_p_abd',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_abd" style="display:none">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_abda" id="obs_p_611_p_abd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Genito-Anal</label>
                                                <select name="p_611_p_gen" id="p_611_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_gen','div_p_611_p_gen','obs_p_611_p_gen',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_gen" style="display:none;">
                                                <label class="floating-label-activo-sm">Genito-Anal</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_gen" id="obs_p_611_p_gen"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Reflejos</label>
                                                <select name="p_611_p_reflex" id="p_611_p_reflex" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_reflex','div_p_611_p_reflex','obs_p_611_p_reflex',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_reflex" style="display:none;">
                                                <label class="floating-label-activo-sm">Reflejos</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_reflex" id="obs_p_611_p_reflex"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tono y Motilidad</label>
                                                <select name="p_611_p_tono" id="p_611_p_tono" data-titulo="Tono y Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_tono','div_p_611_p_tono','obs_p_611_p_tono',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_tono" style="display:none;">
                                                <label class="floating-label-activo-sm">Tono y Motilidad</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Tono y Motilidad" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_tono" id="obs_p_611_p_tono"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Caderas</label>
                                                <select name="p_611_p_cad" id="p_611_p_cad" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_cad','div_p_611_p_cad','obs_p_611_p_cad',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_cad" style="display:none;">
                                                <label class="floating-label-activo-sm">Caderas</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_cad" id="obs_p_611_p_cad"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Extremidades</label>
                                                <select name="p_611_p_ext" id="p_611_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_ext','div_p_611_p_ext','obs_p_611_p_ext',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_ext" style="display:none;">
                                                <label class="floating-label-activo-sm">Extremidades</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_ext" id="obs_p_611_p_ext"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <select name="p_611_p_ojo" id="p_611_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_ojo','div_p_611_p_ojo','obs_p_611_p_ojo',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_ojo" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_ojo" id="obs_p_611_p_ojo"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <select name="p_611_p_oido" id="p_611_p_oido" data-titulo="Oidos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_611_p_oido','div_p_611_p_oido','obs_p_611_p_oido',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_611_p_oido" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Oidos" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_611_p_oido" id="obs_p_611_p_oido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ANTROPOMETRÍA-->
                                <div class="tab-pane fade show" id="antropometria-ns-611m" role="tabpanel" aria-labelledby="antropometria-ns-611m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                        </div>
                                            <div class="form-group col-md-3">
                                            <label class="floating-label">Peso en (gr.)</label>
                                            <input type="number" class="form-control form-control-sm" name="peso_611" id="peso_611">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Longitud (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="longitud_611" id="longitud_611">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="per_cef_611" id="per_cef_611">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros (lesiones)</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font_611" name="otros_font_611"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Señales de maltrato</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="maltrato_611" name="maltrato_611" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <!--DIAGNÓSTICO-->
                                <div class="tab-pane fade show" id="diagnos-ns-611m" role="tabpanel" aria-labelledby="diagnos-ns-611m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Diagnóstico</h6>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">General</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen_611" id="dg_gen_611"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Incremento ponderal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon_611" id="inc_pon_611"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Lactancia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_nutricional_611" id="dg_nutricional_611"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud del lactante</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_sal_lact_611" id="dg_sal_lact_611"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Otros</label>
                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_otros_611" id="dg_otros_611"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud psicosocial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_sal_sicosocial_611" id="dg_sal_sicosocial_611"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES Y PROX. CONTROL-->
                                <div class="tab-pane fade show" id="indicaciones-ns-611m" role="tabpanel" aria-labelledby="indicaciones-ns-611m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="p__611_fecha_proxcontrol" id="p__611_fecha_proxcontrol">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Control con:</label>
                                            <input type="text" class="form-control form-control-sm" name="p_611_control_con" id="p_611_control_con">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Indicaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_611_ind" id="p_611_ind"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Sugerencias</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_611_sugerencias" id="p_611_sugerencias"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nsseis" role="tabpanel" aria-labelledby="nsseis-tab">
                            <h5 class="f-16 text-c-blue">12 a 23 meses</h5>
                            <hr>
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-123m" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-1223m-tab" data-toggle="tab" href="#ficha-tipo-ns-1223m" role="tab" aria-controls="ficha-tipo-ns-1223m" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="pa-gen-ns-1223m-tab" data-toggle="tab" href="#pa-gen-ns-1223m" role="tab" aria-controls="pa-gen-ns-1223m" aria-selected="false">Parametros generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="est-fisica-ns-1223m-tab" data-toggle="tab" href="#est-fisica-ns-1223m" role="tab" aria-controls="est-fisica-ns-1223m" aria-selected="false">Estado fisico del menor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="antropometria-ns-1223m-tab" data-toggle="tab" href="#antropometria-ns-1223m" role="tab" aria-controls="antropometria-ns-1223m" aria-selected="false">Antropometría</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="diagnos-ns-1223m-tab" data-toggle="tab" href="#diagnos-ns-1223m" role="tab" aria-control="diagnos-ns-1223m" aria-selected="false">Diagnósticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-ns-1223m-tab" data-toggle="tab" href="#indicaciones-ns-1223m" role="tab" aria-control="indicaciones-ns-1223m" aria-selected="false">Indicaciones y próx. control</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="ns-1223m">
                                <!--FICHA TIPO-->
                                <div class="tab-pane fade show active" id="ficha-tipo-ns-1223m" role="tabpanel" aria-labelledby="ficha-tipo-ns-1223m-tab">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            Resultado
                                        </div>
                                    </div>
                                </div>
                                <!--PARAMETROS GENERALES-->
                                <div class="tab-pane fade show" id="pa-gen-ns-1223m" role="tabpanel" aria-labelledby="pa-gen-ns-1223m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Parametros generales</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Anamnesis</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="anamnesis_1223" name="anamnesis" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter_1223" name="ev_anter_1223" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Dieta</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta_1223" name="dieta_1223" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Hábitos</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos_1223" name="habitos_1223" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Rutinas de sueño alimentación</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim_1223" name="sueno_alim_1223" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Cuidadores</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores_1223" name="cuidadores_1223" ></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="prev_acc();"><i class="feather icon-file-text"></i> Pauta prevensión accidentes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ESTADO FISICO DEL MENOR-->
                                <div class="tab-pane fade show" id="est-fisica-ns-1223m" role="tabpanel" aria-labelledby="est-fisica-ns-1223m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Examen físico del menor</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Inspección general y relación parental</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="insp_1223_gral" name="insp_1223_gral" ></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Piél</label>
                                                <select name="p__1223_p_piel" id="p_1223_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_piel','div_p_1223_p_piel','obs_p_1223_p_piel',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_piel" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de Piél </label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_piel" id="obs_p_1223_p_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ganglios</label>
                                                <select name="p_1223_p_gang" id="p_1223_p_gang" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_gang','div_p_1223_p_gang','obs_p_1223_p_gang',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_gang" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de Ganglios </label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_gang" id="obs_p_1223_p_gang"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <select name="p_1223_p_carpul" id="p_1223_p_carpul" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_carpul','div_p_1223_p_carpul','obs_p_1223_p_carpul',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_carpul" style="display:none">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_carpul" id="obs_p_1223_p_carpul"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <select name="p_1223_p_abd" id="p_1223_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_abd','div_p_1223_p_abd','obs_p_1223_p_abd',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_abd" style="display:none">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_abda" id="obs_p_1223_p_abd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Genito-Anal</label>
                                                <select name="p_1223_p_gen" id="p_1223_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_gen','div_p_1223_p_gen','obs_p_1223_p_gen',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_gen" style="display:none;">
                                                <label class="floating-label-activo-sm">Genito-Anal</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_gen" id="obs_p_1223_p_gen"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Reflejos</label>
                                                <select name="p_1223_p_reflex" id="p_1223_p_reflex" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_reflex','div_p_1223_p_reflex','obs_p_1223_p_reflex',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_reflex" style="display:none;">
                                                <label class="floating-label-activo-sm">Reflejos</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_reflex" id="obs_p_1223_p_reflex"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tono y Motilidad</label>
                                                <select name="p_1223_p_tono" id="p_1223_p_tono" data-titulo="Tono y Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_tono','div_p_1223_p_tono','obs_p_1223_p_tono',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_tono" style="display:none;">
                                                <label class="floating-label-activo-sm">Tono y Motilidad</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Tono y Motilidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_tono" id="obs_p_1223_p_tono"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Caderas</label>
                                                <select name="p_1223_p_cad" id="p_1223_p_cad" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_cad','div_p_1223_p_cad','obs_p_1223_p_cad',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_cad" style="display:none;">
                                                <label class="floating-label-activo-sm">Caderas</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_cad" id="obs_p_1223_p_cad"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Extremidades</label>
                                                <select name="p_1223_p_ext" id="p_1223_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_ext','div_p_1223_p_ext','obs_p_1223_p_ext',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_ext" style="display:none;">
                                                <label class="floating-label-activo-sm">Extremidades</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_ext" id="obs_p_1223_p_ext"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <select name="p_1223_p_ojo" id="p_1223_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_ojo','div_1223_p_ojo','obs_p_1223_p_ojo',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_1223_p_ojo" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_ojo" id="obs_p_1223_p_ojo"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <select name="p_1223_p_oido" id="p_1223_p_oido" data-titulo="Oidos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_1223_p_oido','div_p_1223_p_oido','obs_p_1223_p_oido',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_1223_p_oido" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Oidos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_1223_p_oido" id="obs_p_1223_p_oido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ANTROPOMETRÍA-->
                                <div class="tab-pane fade show" id="antropometria-ns-1223m" role="tabpanel" aria-labelledby="antropometria-ns-1223m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Peso en (gr.)</label>
                                            <input type="number" class="form-control form-control-sm" name="peso_1223" id="peso_1223">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Longitud (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="longitud_1223" id="longitud_1223">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="per_cefalico_1223" id="per_cefalico_1223">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros (lesiones)</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font_1223" name="otros_font_1223" ></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Señales de maltrato</label>
                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="maltrato_1223" name="maltrato_1223" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <!--DIAGNÓSTICOS-->
                                <div class="tab-pane fade show" id="diagnos-ns-1223m" role="tabpanel" aria-labelledby="diagnos-ns-1223m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Diagnósticos</h6>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">General</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_1223_general" id="dg_1223_general"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Incremento ponderal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_1223_inscr_ponderal" id="dg_1223_inscr_ponderal"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Lactancia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_1223_lactancia" id="dg_1223_lactancia"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud del lactante</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_1223_salud_lactante" id="dg_1223_salud_lactante"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud de la madre</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_1223_salud_madre" id="dg_1223_salud_madre"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Salud psicosocial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_1223_sal_psico" id="dg_1223_sal_psico"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES Y PROX. CONTROL-->
                                <div class="tab-pane fade show" id="indicaciones-ns-1223m" role="tabpanel" aria-labelledby="indicaciones-ns-1223m-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="p_1223_fecha_proxcontrol" id="p_1223_fecha_proxcontrol">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Control con:</label>
                                            <input type="text" class="form-control form-control-sm" name="p_1223_control_con" id="p_1223_control_con">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Indicaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="p_1223_ind" id="p_1223_ind"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Sugerencias</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_1223_sugerencias" id="p_1223_sugerencias"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nssiete" role="tabpanel" aria-labelledby="nssiete-tab">
                            <h5 class="f-16 text-c-blue">2 a 4 años</h5>
                            <hr>
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-24a" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-24a-tab" data-toggle="tab" href="#ficha-tipo-ns-24a" role="tab" aria-controls="ficha-tipo-ns-24a" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="pa-gen-ns-24a-tab" data-toggle="tab" href="#pa-gen-ns-24a" role="tab" aria-controls="pa-gen-ns-24a" aria-selected="false">Parametros generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="est-fisica-ns-24a-tab" data-toggle="tab" href="#est-fisica-ns-24a" role="tab" aria-controls="est-fisica-ns-24a" aria-selected="false">Estado fisico del menor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="antropometria-ns-24a-tab" data-toggle="tab" href="#antropometria-ns-24a" role="tab" aria-controls="antropometria-ns-24a" aria-selected="false">Antropometría</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="diagnos-ns-24a-tab" data-toggle="tab" href="#diagnos-ns-24a" role="tab" aria-control="diagnos-ns-24a" aria-selected="false">Diagnósticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-ns-24a-tab" data-toggle="tab" href="#indicaciones-ns-24a" role="tab" aria-control="indicaciones-ns-24a" aria-selected="false">Indicaciones y próx. control</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="ns-24a">
                                <!--FICHA TIPO-->
                                <div class="tab-pane fade show active" id="ficha-tipo-ns-24a" role="tabpanel" aria-labelledby="ficha-tipo-ns-24a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_ped('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            Resultado
                                        </div>
                                    </div>
                                </div>
                                <!--PARAMETROS GENERALES-->
                                <div class="tab-pane fade show" id="pa-gen-ns-24a" role="tabpanel" aria-labelledby="pa-gen-ns-24a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Parametros generales</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Anamnesis</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="anamnesis_24" name="anamnesis_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="ev_anter_24" name="ev_anter_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Dieta</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="dieta_24" name="dieta_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Hábitos</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="habitos_24" name="habitos_24" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Rutinas de sueño alimentación</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="sueno_alim_24" name="sueno_alim_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Cuidadores</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=2" onblur="this.rows=1;" id="cuidadores_24" name="cuidadores_24" ></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="prev_acc();"><i class="feather icon-file-text"></i> Pauta prevención accidentes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ESTADO FISICO-->
                                <div class="tab-pane fade show" id="est-fisica-ns-24a" role="tabpanel" aria-labelledby="est-fisica-ns-24a-tab">
                                    <div class="form-row mb-2">
                                        <div class="col-md-12">
                                            <h5 class="text-c-blue ">Examen físico del menor</h5>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Inspección general y relación parental</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="" onfocus="this.rows=4" id="insp_24_gral" name="insp_24_gral"></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Piél</label>
                                                <select name="p_24_p_piel" id="p_24_p_piel" data-titulo="Piel"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_piel','div_p_24_p_piel','obs_p_24_p_piel',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_piel" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de Piél </label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Piel" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_piel" id="obs_p_24_p_piel"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ganglios</label>
                                                <select name="p_24_p_gang" id="p_24_p_gang" data-titulo="Ganglios"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_gang','div_p_24_p_gang','obs_p_24_p_gang',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_gang" style="display:none">
                                                <label class="floating-label-activo-sm">Examen de Ganglios</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ganglios" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_gang" id="obs_p_24_p_gang"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <select name="p_24_p_carpul" id="p_24_p_carpul" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_carpul','div_p_24_p_carpul','obs_p_24_p_carpul',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_carpul" style="display:none">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_carpul" id="obs_p_24_p_carpul"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <select name="p_24_p_abd" id="p_24_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_abd','div_p_24_p_abd','obs_p_24_p_abd',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_abd" style="display:none">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_abda" id="obs_p_24_p_abd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Genito-Anal</label>
                                                <select name="p_24_p_gen" id="p_24_p_gen" data-titulo="Genitales"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_gen','div_p_24_p_gen','obs_p_24_p_gen',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group " id="div_p_24_p_gen" style="display:none;">
                                                <label class="floating-label-activo-sm">Genito-Anal</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Genitales" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_gen" id="obs_p_24_p_gen"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Presión Arterial</label>
                                                <select name="p_24_p_reflex" id="p_24_p_reflex" data-titulo="Reflejos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_reflex','div_p_24_p_reflex','obs_p_24_p_reflex',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Examinada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_reflex" style="display:none;">
                                                <label class="floating-label-activo-sm">Presión Arterial</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Reflejos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_reflex" id="obs_p_24_p_reflex"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex. Neurológico</label>
                                                <select name="p_24_p_tono" id="p_24_p_tono" data-titulo="Tono y Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_tono','div_p_24_p_tono','obs_p_24_p_tono',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_tono" style="display:none;">
                                                <label class="floating-label-activo-sm">Ex. Neurológico</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Tono y Motilidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_tono" id="obs_p_24_p_tono"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Marcha</label>
                                                <select name="p_24_p_cad" id="p_24_p_cad" data-titulo="Marcha"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_cad','div_p_24_p_cad','obs_p_24_p_cad',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_cad" style="display:none;">
                                                <label class="floating-label-activo-sm">Marcha</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Marcha" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_cad" id="obs_p_24_p_cad"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pié plano flexible</label>
                                                <select name="p_24_p_ext" id="p_24_p_ext" data-titulo="Extremidades"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_ext','div_p_24_p_ext','obs_p_24_p_ext',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si</option>
                                                    <option value="3">No Examinado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_ext" style="display:none;">
                                                <label class="floating-label-activo-sm">Pié plano flexible</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Extremidades" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_ext" id="obs_p_24_p_ext"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pié plano doloroso</label>
                                                <select name="p_24_p_ppd" id="p_24_p_ppd" data-titulo="ppd"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_ppd','div_p_24_p_ppd','obs_p_24_p_ppd',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si</option>
                                                    <option value="3">No Examinado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_ppd" style="display:none;">
                                                <label class="floating-label-activo-sm">Pié plano doloroso</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="ppd" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_ppd" id="obs_p_24_p_ppd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Genu valgo</label>
                                                <select name="p_24_p_gv" id="p_24_p_gv" data-titulo="Genuvalgo"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_gv','div_p_24_p_gv','obs_p_24_p_gv',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si</option>
                                                    <option value="3">No Examinado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_gv" style="display:none;">
                                                <label class="floating-label-activo-sm">Genu valgo</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Genuvalgo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_gv" id="obs_p_24_p_gv"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <select name="p_24_p_ojo" id="p_24_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_ojo','div_p_24_p_ojo','obs_p_24_p_ojo',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_ojo" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_ojo" id="obs_p_24_p_ojo"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <select name="p_24_p_oido" id="p_24_p_oido" data-titulo="Oidos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_24_p_oido','div_p_24_p_oido','obs_p_24_p_oido',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_24_p_oido" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Oidos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_24_p_oido" id="obs_p_24_p_oido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--ANTROPOMETRÍA-->
                                <div class="tab-pane fade show" id="antropometria-ns-24a" role="tabpanel" aria-labelledby="antropometria-ns-24a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Peso en (gr.)</label>
                                            <input type="number" class="form-control form-control-sm" name="peso_24" id="peso_24">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Longitud (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="longitud_24" id="longitud_24">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Perímetro cefálico (cm.)</label>
                                            <input type="number" class="form-control form-control-sm" name="per_cefalico_24" id="per_cefalico_24">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros (lesiones)</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font_24" name="otros_font_24" ></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Señales de maltrato</label>
                                                <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="maltrato_24" name="maltrato_24" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <!--DIAGNÓSTICO-->
                                <div class="tab-pane fade show" id="diagnos-ns-24a" role="tabpanel" aria-labelledby="diagnos-ns-24a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Diagnóstico</h6>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">General</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen_24" id="dg_gen_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Incremento ponderal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon_24" id="inc_pon_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Otros</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros_24" id="otros_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Salud psicosocial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial_24" id="sal_sicosocial_24"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES Y PROX. CONTROL-->
                                <div class="tab-pane fade show" id="indicaciones-ns-24a" role="tabpanel" aria-labelledby="indicaciones-ns-24a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha_proxcontrol_24" id="fecha_proxcontrol_24">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Control con:</label>
                                            <input type="text" class="form-control form-control-sm" name="control_con_24" id="control_con_24">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Indicaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="ind_24" id="ind_24"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Sugerencias</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sugerencias_24" id="ugerencias_24"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nsocho" role="tabpanel" aria-labelledby="nsocho-tab">
                            <h5 class="f-16 text-c-blue">6 a 9 años</h5>
                            <hr>
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ns-69a" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ficha-tipo-ns-69a-tab" data-toggle="tab" href="#ficha-tipo-ns-69a" role="tab" aria-controls="ficha-tipo-ns-69a" aria-selected="true">Ficha tipo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="pa-gen-ns-69a-tab" data-toggle="tab" href="#pa-gen-ns69a" role="tab" aria-controls="pa-gen-ns-69a" aria-selected="false">Parametros generales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="est-fisica-ns-69a-tab" data-toggle="tab" href="#est-fisica-ns-69a" role="tab" aria-controls="est-fisica-ns-69a" aria-selected="false">Estado fisico del menor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="antropometria-ns-69a-tab" data-toggle="tab" href="#antropometria-ns-69a" role="tab" aria-controls="antropometria-ns-69a" aria-selected="false">Antropometría</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="diagnos-ns-69a-tab" data-toggle="tab" href="#diagnos-ns-69a" role="tab" aria-control="diagnos-ns-69a" aria-selected="false">Diagnósticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-ns-69a-tab" data-toggle="tab" href="#indicaciones-ns-69a" role="tab" aria-control="indicaciones-ns-69a" aria-selected="false">Indicaciones y próx. control</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="ns-6-9a">
                                <!--FICHA TIPO-->
                                <div class="tab-pane fade show active" id="ficha-tipo-ns-69a" role="tabpanel" aria-labelledby="ficha-tipo-ns-69a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Ficha tipo</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                            <select class="form-control form-control-sm" id="select_ficha_tipo_especialidad" onchange="cargar_info_ficha_tipo_69('select_ficha_tipo_especialidad','descripcion_ficha_tipo_especialidad');">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            Resultado
                                        </div>
                                    </div>
                                </div>
                                <!--PARAMETROS GENERALES-->
                                <div class="tab-pane fade show" id="pa-gen-ns69a" role="tabpanel" aria-labelledby="pa-gen-ns69a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Control de parámetros generales</h6>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Anamnesis</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis_69" name="anamnesis_69" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Evaluaciones psicoafectivas</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_psicoa_69" name="ev_psicoa_69" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Otros</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_69" name="otros_69" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--ESTADO FISICO-->
                                <div class="tab-pane fade show" id="est-fisica-ns-69a" role="tabpanel" aria-labelledby="est-fisica-ns-69a-tab">
                                   <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Estado físico del menor</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Inspección general y relación parental</label>
                                            <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="insp_gral_69" name="insp_gral_69" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--ANTROPOMETRÍA-->
                                <div class="tab-pane fade show" id="antropometria-ns-69a" role="tabpanel" aria-labelledby="antropometria-ns-69a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Antropometría</h6>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Peso (kg.)</label>
                                            <input type="number" class="form-control form-control-sm" name="pesoIMC_69" id="pesoIMC_69">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Talla (cms.)</label>
                                            <input type="number" class="form-control form-control-sm" name="alturaIMC_69" id="alturaIMC_69">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="cimc();" >Calcular IMC</button>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">IMC</label>
                                            <input type="number" class="form-control form-control-sm" placeholder=" Resultado IMC"  id="resultadoIMC_69" name="resultadoIMC_69"  >
                                            <script>
                                                function cimc(){
                                                var peso = document.querySelector('#pesoIMC_69').value;
                                                var altura = document.querySelector('#alturaIMC_69').value;

                                                var alturaMetro = altura/100;
                                                var imc = Math.round(peso / (alturaMetro + alturaMetro));
                                                var leyenda = '';

                                                if (imc <= 21) {

                                                    leyenda = "Está delgado. Debe engordar " + Math.round(alturaMetro * alturaMetro * 20.5 - peso) + " kilos";
                                                }else if(imc >= 26){
                                                    leyenda = "Tiene sobrepeso. Debe adelgazar " + Math.round(peso - alturaMetro * alturaMetro * 25.5) + " kilos";
                                                }else{
                                                    leyenda = "Esta en  peso ideal";
                                                }
                                                //var hr = document.createElement('hr');
                                                //var spanIMC = document.createElement('span');
                                                //spanIMC.textContent = `IMC: ${imc} - ${leyenda}`;
                                                //var divResultado = document.querySelector('#resultado');
                                                document.querySelector('#resultadoIMC_69').value = imc;
                                                //divResultado.appendChild(hr);
                                                //divResultado.appendChild(spanIMC);
                                            }
                                            </script>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="calcular_imc()">Valores referenciales</button>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm text-danger">Desarrollo puberal *</label>
                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=3;" id="desarr_pub_69" name="desarr_pub_69" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm  text-danger">Desarrollo puberal *</label>
                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=3;" id="resp_desarr_pub_69" name="resp_desarr_pub_69" placeholder="Revisar cuestionario (Completado por Padres)" ></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm  text-danger">Ex. Genitoanal *</label>
                                            <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=3;" id="genito_anal_69" name="genito_anal_69" ></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                Este examen se debe desarrollar con la presencia del adulto responsable del menor y con el consentimiento escolar
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Presión arterial</label>
                                                <select name="p_69_p_pa" id="p_69_p_pa" data-titulo="Presion"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_pa','div_p_69_p_pa','obs_p_69_p_pa',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informada</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_pa" style="display:none">
                                                <label class="floating-label-activo-sm">Presión arterial</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Presion" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_pa" id="obs_p_69_p_pa"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Test de Adams</label>
                                                <select name="p_69_p_tadam" id="p_69_p_tadam" data-titulo="Adams"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_tadam','div_p_69_p_tadam','obs_p_69_p_tadam',2);">
                                                    <option selected value="1">Normal </option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_tadam" style="display:none">
                                                <label class="floating-label-activo-sm">Test de Adams</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Adams" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_tadam" id="obs_p_69_p_tadam"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <select name="p_25_p_carpul" id="p_69_p_carpul" data-titulo="Torax"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_carpul','div_p_69_p_carpul','obs_p_69_p_carpul',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_carpul" style="display:none">
                                                <label class="floating-label-activo-sm">Cardio-Pulmonar</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Torax" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_carpul" id="obs_p_69_p_carpul"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <select name="p_25_p_abd" id="p_69_p_abd" data-titulo="Abdomen"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_abd','div_p_69_p_abd','obs_p_69_p_abd',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informado</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_abd" style="display:none">
                                                <label class="floating-label-activo-sm">Abdomen</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Abdomen" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_abda" id="obs_p_69_p_abd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex. Bucodental</label>
                                                <select name="p_69_p_bd" id="p_69_p_bd" data-titulo="Bucodental"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_bd','div_p_69_p_bd','obs_p_69_p_bd',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterada</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group " id="div_p_69_p_bd" style="display:none;">
                                                <label class="floating-label-activo-sm">Ex. Bucodental</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Bucodental" rows="1" onfocus="this.rows=6" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_p_69_p_bd" id="obs_p_69_p_bd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Marcha</label>
                                                <select name="p_69_p_mar" id="p_69_p_mar" data-titulo="Marcha"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_mar','div_p_69_p_mar','obs_p_69_p_mar',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_mar" style="display:none;">
                                                <label class="floating-label-activo-sm">Marcha</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Marcha" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_mar" id="obs_p_69_p_mar"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pié plano flexible</label>
                                                <select name="p_69_p_ppf" id="p_69_p_ppf" data-titulo="Tono y Motilidad"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_ppf','div_p_69_p_ppf','obs_p_69_p_ppf',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_ppf" style="display:none;">
                                                <label class="floating-label-activo-sm">Pié plano flexible</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Tono y Motilidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_ppf" id="obs_p_69_p_ppf"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pié plano doloroso</label>
                                                <select name="p_69_p_ppd" id="p_69_p_ppd" data-titulo="Caderas"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_ppd','div_p_69_p_ppd','obs_p_69_p_ppd',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_ppd" style="display:none;">
                                                <label class="floating-label-activo-sm">Pié plano doloroso</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Caderas" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_ppd" id="obs_p_69_p_ppd"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Genu valgo</label>
                                                <select name="p_69_p_gen" id="p_69_p_gen" data-titulo="genu"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_gen','div_p_69_p_gen','obs_p_69_p_gen',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alteradas</option>
                                                    <option value="3">No Informadas</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_gen" style="display:none;">
                                                <label class="floating-label-activo-sm">Genu valgo</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="genu" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_gen" id="obs_p_69_p_gen"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex Oftalmológico</label>
                                                <select name="p_69_p_ojo" id="p_69_p_ojo" data-titulo="Ojos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_ojo','div_p_69_p_ojo','obs_p_69_p_ojo',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterado</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_ojo" style="display:none">
                                                <label class="floating-label-activo-sm">Ex. Oftalmológico</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Ojos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_ojo" id="obs_p_69_p_ojo"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ex. Auditívo</label>
                                                <select name="p_69_p_oido" id="p_69_p_oido" data-titulo="Oidos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_oido','div_p_69_p_oido','obs_p_69_p_oido',2);">
                                                    <option selected value="1">Normal</option>
                                                    <option value="2">Alterados</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_oido" style="display:none">
                                                <label class="floating-label-activo-sm">Ex Auditívo</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Oidos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_oido" id="obs_p_69_p_oido"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Señales de maltrato</label>
                                                <select name="p_69_p_mt" id="p_69_p_mt" data-titulo="Oidos"class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('p_69_p_mt','div_p_69_p_mt','obs_p_69_p_mt',2);">
                                                    <option selected value="1">No</option>
                                                    <option value="2">Si</option>
                                                    <option value="3">No Informados</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="div_p_69_p_mt" style="display:none">
                                                <label class="floating-label-activo-sm">Señales de maltrato</label>
                                                <textarea class="form-control form-control-sm"  data-titulo="Oidos" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_p_69_p_mt" id="obs_p_69_p_mt"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary-light btn-block btn-sm" onclick="abrir_modal_guardar_tipo();"><i class="fas fa-save"></i> Guardar nuevo examen tipo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!--DIAGNÓSTICO-->
                                <div class="tab-pane fade show" id="diagnos-ns-69a" role="tabpanel" aria-labelledby="diagnos-ns-69a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Diagnóstico</h6>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">General</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_general_69" id="dg_general_69"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Nutricional</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_nutricional_69" id="dg_nutricional_69"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Salud (General)</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_sal_gnal_69" id="dg_sal_gnal_69"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Salud psicosocial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_s_psicosocial_69" id="dg_s_psicosocial_69"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES Y PROX. CONTROL-->
                                <div class="tab-pane fade show" id="indicaciones-ns-69a" role="tabpanel" aria-labelledby="indicaciones-ns-69a-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Indicaciones y próximo control</h6>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="p_69_fecha_proxcontrol" id="p_69_fecha_proxcontrol">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Control con:</label>
                                            <input type="text" class="form-control form-control-sm" name="p_69_control_con" id="p_69_control_con">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Indicaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_69_ind" id="p_69_ind"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Sugerencias</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="p_69_sugerencias" id="p_69_sugerencias"></textarea>
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




