<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="ficha-ad-psico" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="fcc-atencion-diagnostica" data-toggle="tab" href="#atencion-diagnostica" role="tab" aria-controls="atencion-diagnostica" aria-selected="false">Atención diagnóstica</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="evolucion-tab" data-toggle="tab" href="#evolucion" role="tab" aria-controls="evolucion" aria-selected="true">Evolución</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-0 pt-3 d-inline float-left">
                    {{-- mensaje --}}
                    <div class="alert alert-success" role="alert" id="mensaje_ficha"></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="ficha-ad-psico">
                    <!--ATENCIÓN  DIAGNOSTICA-->
                    <div class="tab-pane fade show active" id="atencion-diagnostica" role="tabpanel" aria-labelledby="atencion-diagnostica">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 text-center mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Atención diagnóstica</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="motivo_consulta_evol" name="descripcion_hipotesis" id="descripcion_hipotesis" onchange="cargarIgual('descripcion_hipotesis')" >
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Derivado por:</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="psi_remision" id="psi_remision"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="psi_observaciones" id="psi_observaciones"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="ant_gen">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ant_gen-c" aria-expanded="false" aria-controls="ant_gen-c">
                                                  Antecedentes Generales
                                                </button>
                                            </div>
                                            <div id="ant_gen-c" class="collapse" aria-labelledby="ant_gen" data-parent="#ant_gen">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="ps_ant_gen_tab" data-toggle="tab" href="#ps_ant_gen" role="tab" aria-controls="ps_ant_gen" aria-selected="true">generales</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="residencia_tab" data-toggle="tab" href="#residencia" role="tab" aria-controls="residencia" aria-selected="false">Residencia</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="psi_habitos_tab" data-toggle="tab" href="#psi_habitos" role="tab" aria-controls="psi_habitos" aria-selected="false">Habitos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="psi_trabajo_tab" data-toggle="tab" href="#psi_trabajo" role="tab" aria-controls="psi_trabajo" aria-selected="false">Trabajo</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="psi_esparcimiento_tab" data-toggle="tab" href="#psi_esparcimiento" role="tab" aria-controls="psi_esparcimiento" aria-selected="false">Esparcimiento</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="psi_obs_gen_ant_tab" data-toggle="tab" href="#psi_obs_gen_ant" role="tab" aria-controls="psi_obs_gen_ant" aria-selected="false">Observaciones generales</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="pediat-contenido">
                                                                <!--generales-->
                                                                <div class="tab-pane fade show active" id="ps_ant_gen" role="tabpanel" aria-labelledby="ps_ant_gen_tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Lugar de nacimiento</label>
                                                                                <input type="text" class="form-control form-control-sm" name="psi_ant_lugar_nacimiento" id="psi_ant_lugar_nacimiento">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Estado civil</label>
                                                                                <select class="form-control form-control-sm" name="psi_ant_gen_estado_civil " id="psi_ant_gen_estado_civil">
                                                                                  <option value="0">Seleccione</option>
                                                                                  <option value="1">Soltero/a</option>
                                                                                  <option value="2">En pareja</option>
                                                                                  <option value="3">Casado/a</option>
                                                                                  <option value="4">Separado/a</option>
                                                                                  <option value="5">Viudo/a</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Nivel de educación</label>
                                                                                <select class="form-control form-control-sm" name="psi_ant_gen_niv_ed" id="psi_ant_gen_niv_ed">
                                                                                  <option value="0">Seleccione</option>
                                                                                  <option value="1">Básica incompleta</option>
                                                                                  <option value="2">Básica completa</option>
                                                                                  <option value="3">Ens. Media incompleta</option>
                                                                                  <option value="4">Ens. Media completa</option>
                                                                                  <option value="5">Universitaria incompleta</option>
                                                                                  <option value="6">Universitaria completa</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Ocupación</label>
                                                                                <input type="text" class="form-control form-control-sm" name="psi_ant_gen_ocupacion" id="psi_ant_gen_ocupacion">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm">Religión</label>
                                                                                <input type="text" class="form-control form-control-sm" name="psi_ant_gen_religion" id="psi_ant_gen_religion">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--residencia-->
                                                                <div class="tab-pane fade show" id="residencia" role="tabpanel" aria-labelledby="residencia_tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                           <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Vive con</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_ant_vive_con" id="psi_ant_vive_con"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_ant_vive_obs" id="psi_ant_vive_obs"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--habitos-->
                                                                <div class="tab-pane fade show" id="psi_habitos" role="tabpanel" aria-labelledby="psi_habitos_tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Consumo de alcohol</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_alcohol" id="psi_ant_alcohol"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Consumo de tabaco</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_tabaco" id="psi_ant_tabaco"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Consumo de sust. ilicitas</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_sustancias_ilicitas" id="psi_ant_sustancias_ilicitas"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm">Sexualidad</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_sexualidad" id="psi_ant_sexualidad"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Comentarios generales</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_com_generales" id="psi_ant_com_generales"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--trabajo-->
                                                                <div class="tab-pane fade" id="psi_trabajo" role="tabpanel" aria-labelledby="psi_trabajo_tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Antecedentes laborales</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_laborales" id="psi_ant_laborales"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--esparcimiento-->
                                                                <div class="tab-pane fade" id="psi_esparcimiento" role="tabpanel" aria-labelledby="psi_esparcimiento_tab">
                                                                    <form>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm">Esparcimiento</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ant_esparc" id="psi_ant_esparc"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!--OBSERVACIONES GENERALES-->
                                                                <div class="tab-pane fade show " id="psi_obs_gen_ant" role="tabpanel" aria-labelledby="psi_obs_gen_ant_tab">
                                                                    <div class="form-row">

                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm">Observaciones Generales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_ant_obs_generales" id="psi_ant_obs_generales"></textarea>
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
                                    <!--BIOPATOGRAFÍA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="biopato">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#biopato-c" aria-expanded="false" aria-controls="biopato-c">
                                                  Biopatografía
                                                </button>
                                            </div>
                                            <div id="biopato-c" class="collapse" aria-labelledby="biopato" data-parent="#biopato">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Prenatal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_prenatal" id="psi_biop_prenatal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Natal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_natal" id="psi_biop_natal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Infancia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_infancia" id="psi_biop_infancia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adolescencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_adolescencia" id="psi_biop_adolescencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Edad adulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_edad_adulta" id="psi_biop_edad_adulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adulto mayor</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_ad_mayor" id="psi_biop_ad_mayor"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Actualidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_biop_actualidad" id="psi_biop_actualidad"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--HISTORIA FAMILIAR-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="hist-familiar">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#hist-familiar-c" aria-expanded="false" aria-controls="hist-familiar-c">
                                                  Historia familiar / Personas significativas
                                                </button>
                                            </div>
                                            <div id="hist-familiar-c" class="collapse" aria-labelledby="hist-familiar" data-parent="#hist-familiar">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="padres-hf-tab" data-toggle="tab" href="#padres-hf" role="tab" aria-controls="padres-hf" aria-selected="true">Padres</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="hermanos-hf-tab" data-toggle="tab" href="#hermanos-hf" role="tab" aria-controls="hermanos-hf" aria-selected="false">Hermanos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="relacion-hf-tab" data-toggle="tab" href="#relacion-hf" role="tab" aria-controls="relacion-hf" aria-selected="false">Relación marital</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="hijos-hf-tab" data-toggle="tab" href="#hijos-hf" role="tab" aria-controls="hijos-hf" aria-selected="false">Hijos</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="otros-hf-tab" data-toggle="tab" href="#otros-hf" role="tab" aria-controls="otros-hf" aria-selected="false">Otras personas</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="obs-gen-hf-tab" data-toggle="tab" href="#obs-gen-hf" role="tab" aria-controls="obs-gen-hf" aria-selected="false">Observaciones generales</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="pediat-contenido">
                                                                <!--PADRES-->
                                                                <div class="tab-pane fade show active" id="padres-hf" role="tabpanel" aria-labelledby="padres-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <h6 class="text-c-blue mb-3">PADRE</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre padre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_padre" id="psi_hf_nombre_padre">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con el padre</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_padre" id="psi_hf_rel_padre"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <h6 class="text-c-blue mb-3">MADRE</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre madre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="psi_nombre_madre" id="psi_hf_nombre_madre">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con la madre</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_madre" id="psi_hf_rel_madre"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre padres</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_entre_padres" id="psi_rel_entre_padres"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--HERMANOS-->
                                                                <div class="tab-pane fade show" id="hermanos-hf" role="tabpanel" aria-labelledby="hermanos-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">HERMANOS</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">¿Tiene hermanos/as?</label>
                                                                                <select class="form-control form-control-sm" name="psi_hf_tiene_hnos" id="psi_hf_tiene_hnos">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No tiene</option>
                                                                                    <option value="2">Si tiene</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                                                <input type="number" class="form-control form-control-sm" name="psi_hf_cantidad_hnos" id="psi_hf_cantidad_hnos">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hermanos" ><i class="fas fa-save"></i> + Agregar Hermano</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div id="contenedor_hermanos">
                                                                                <div id="hermanos">
                                                                                    <form>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Nombre Hermano</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hno" id="psi_hf_nombre_hno">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Relación con Hermano</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_rel_hf_hno" id="psi_rel_hf_hno"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm">Relación entre Hermanos</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_entre_hijos" id="psi_hf_rel_entre_hijos"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!--RELACION MARITAL-->
                                                                <div class="tab-pane fade show" id="relacion-hf" role="tabpanel" aria-labelledby="relacion-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">RELACIÓN MARITAL</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre de pareja</label>
                                                                                <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_pareja" id="psi_hf_nombre_pareja">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con la pareja</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="psi_hf_rel_pareja" id="psi_hf_rel_pareja"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="psi_rel_hf_pareja_obs" id="psi_rel_hf_pareja_obs"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--HIJOS-->
                                                                <div class="tab-pane fade" id="hijos-hf" role="tabpanel" aria-labelledby="hijos-hf-tab">
                                                                    <div id="contenedor_hijo">
                                                                        <div id="hijo">
                                                                            <form>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">¿Tiene hijos/as?</label>
                                                                                            <select class="form-control form-control-sm" name="psi_hf_tiene_hijos" id="psi_hf_tiene_hijos">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">No tiene</option>
                                                                                                <option value="2">Si tiene</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Cantidad</label>
                                                                                            <input type="number" class="form-control form-control-sm" name="psi_hf_cantidad_hijos" id="psi_hf_cantidad_hijos">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hijo" ><i class="fas fa-save"></i> + Agregar Hijos</button>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Nombre Hijo/a</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hijo" id="psi_hf_nombre_hijo">
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Relación con Nombre Hijo/a</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_hijo" id="psi_hf_rel_hijo"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Relación entre Hermanos</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_entre_hijos" id="psi_hf_rel_entre_hijos"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--OTRAS PERSONAS-->
                                                                <div class="tab-pane fade" id="otros-hf" role="tabpanel" aria-labelledby="otros-hf-tab">
                                                                    <div id="contenedor_otro">
                                                                        <div id="otro">
                                                                            <form>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Nombre</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_ot_per" id="psi_hf_nombre_ot_per">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm">Relación con (Nombre de la persona)</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_ot_per" id="psi_hf_rel_ot_per"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                        <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-otro" ><i class="fas fa-save"></i> + Agregar Otras personas</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--OBSERVACIONES GENERALES-->
                                                                <div class="tab-pane fade show " id="obs-gen-hf" role="tabpanel" aria-labelledby="obs-gen-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">OBSERVACIONES GENERALES</h6>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_obs_generales" id="psi_hf_rel_obs_generales"></textarea>
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

                                    <!--ANTECEDENTES MÉDICOS, PSIQUIATRICOS, PSICOLÓGICOS-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="a-med">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#a-med-c" aria-expanded="false" aria-controls="a-med-c">
                                                  Antecedentes médicos, psiquiatricos, psicológicos
                                                </button>
                                            </div>
                                            <div id="a-med-c" class="collapse" aria-labelledby="a-med" data-parent="#a-med">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes médicos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_ant_medicos" id="psi_am_ant_medicos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Ant. de suicidio (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_ant_enf_mentales" id="psi_am_ant_enf_mentales"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Ant. de enfermedades mentales (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_ant_suicidio" id="psi_am_ant_suicidio"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Tratamientos psicologicos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_trat_psicologicos_prev" id="psi_am_trat_psicologicos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Tratamientos psiquiátricos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_trat_psiquiatricos_prev" id="psi_am_trat_psiquiatricos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Medicación (actual)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_am_medicacion_actual" id="psi_am_medicacion_actual"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXÁMEN MENTAL-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="exmental">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exmental-c" aria-expanded="false" aria-controls="exmental-c">
                                                  Exámen mental
                                                </button>
                                            </div>
                                            <div id="exmental-c" class="collapse" aria-labelledby="exmental" data-parent="#exmental">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Presentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_presentacion" id="psi_ex_mental_presentacion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Conciencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_conciencia" id="psi_ex_mental_conciencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Actitud</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_actitud" id="psi_ex_mental_actitud"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Atención y concentración</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_antencion_concentracion" id="psi_ex_mental_antencion_concentracion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Afectividad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_afectividad" id="psi_ex_mental_afectividad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Pensamiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_pensamiento" id="psi_ex_mental_pensamiento"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sensopercepción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_sensopercepcion" id="psi_ex_mental_sensopercepcion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Psicomotricidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_psicomotricidad" id="psi_ex_mental_psicomotricidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sueño</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_sueno" id="psi_ex_mental_sueno"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Higiene</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_higiene" id="psi_ex_mental_higiene"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Alimentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psi_ex_mental_alimentacion" id="psi_ex_mental_alimentacion"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--PLAN DE TRABAJO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="plan-trabajo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-trabajo-c" aria-expanded="false" aria-controls="plan-trabajo-c">
                                                  Plan de trabajo
                                                </button>
                                            </div>
                                            <div id="plan-trabajo-c" class="collapse" aria-labelledby="plan-trabajo" data-parent="#plan-trabajo">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="psi_solo_control" id="psi_solo_control" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="psi_solo_control_check" name="psi_solo_control_check" value="" />
                                                                                <label for="psi_solo_control_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Solo Control</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="psi_ter_indiv" id="psi_ter_indiv" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="psi_ter_indiv_check" name="psi_ter_indiv_check" value="" />
                                                                                <label for="psi_ter_indiv_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Terápia Individual</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="psi_ter_grup" id="psi_ter_grup" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="psi_ter_grup_check" name="psi_ter_grup_check" value="" />
                                                                                <label for="psi_ter_grup_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Terápia Grupal</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="psi_sol_hosp" id="psi_sol_hosp" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="sol_hosp_check" name="sol_hosp_check" value="" />
                                                                                <label for="sol_hosp_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Solicitar Hospitalización</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="psi_obs_plan_tratamiento" id="psi_obs_plan_tratamiento"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="ind_terapia();"><i class="feather icon-plus"></i> Plan de tratamiento</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="ind_ic_psi();"><i class="feather icon-plus"></i> Indicar Interconsulta Siquiatría</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="informe_psi();"><i class="feather icon-plus"></i> Enviar Informe</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="diagnostico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                  Diagnóstico e Indicaciones
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm" name="psi_hip-diag" id="psi_hip-diag">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" name="cie10" id="cie10">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Indicaciones al paciente</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Indicaciones" data-seccion=" Indicaciones" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="psi_indicaciones_pcte" id="psi_indicaciones_pcte"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--BOTON GUARDAR-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                        <button type="button" class="btn btn-info"><i class="fas fa-save"></i> Guardar atención diagnóstica</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--EVOLUCION-->
                    <div class="tab-pane fade" id="evolucion" role="tabpanel" aria-labelledby="evolucion">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 text-center mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Evolución</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="mot-consulta-ev">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-ev-c" aria-expanded="false" aria-controls="mot-consulta-ev-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-ev-c" class="collapse" aria-labelledby="mot-consulta-ev" data-parent="#mot-consulta-ev">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta_evol" id="motivo_consulta_evol"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="eval-actual">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval-actual-c" aria-expanded="false" aria-controls="eval-actual-c">
                                                  Evaluación actual
                                                </button>
                                            </div>
                                            <div id="eval-actual-c" class="collapse" aria-labelledby="eval-actual" data-parent="#eval-actual">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Evaluación actual</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="psi_evaluacion_control" id="psi_evaluacion_control"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--PLAN PROPUESTO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="plan">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-c" aria-expanded="false" aria-controls="plan-c">
                                                  Plan propuesto
                                                </button>
                                            </div>
                                            <div id="plan-c" class="collapse" aria-labelledby="plan" data-parent="#plan">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Plan propuesto</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="psi_plan_prop_evol" id="psi_plan_prop_evol"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--RESULTADOS-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Resultados
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Resultados</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="psi_evol_result" id="psi_evol_result"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--indic y próximo control-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="ind_prox_control">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ind_prox_control-c" aria-expanded="false" aria-controls="ind_prox_control-c">
                                                  Indicaciones y Próximo Control
                                                </button>
                                            </div>
                                            <div id="ind_prox_control-c" class="collapse" aria-labelledby="ind_prox_control" data-parent="#ind_prox_control">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                <label class="floating-label-activo-sm">Próximo Control</label>
                                                                <input type="date" class="form-control form-control-sm" name="psi_prox_control" id="psi_prox_control">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="psi_evol_indicaciones" id="psi_evol_indicaciones"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mb-3">
                                        <button type="button" class="btn btn-info"><i class="fas fa-save"></i> Guardar evolución</button>
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

@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.modal_indicar_terapia')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.m_interconsulta_psi')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.informe_psico')

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
    $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
</script>


<script>

    /* Ponemos "agregarhermano" en el ámbito de toda la página */
    function agregarHermanos(){
       var html = '';
       html += '<div id="contenedor_hermanos">';
       html += '<div id="hermanos">';
       html += '<form>';
       html += '<div class="form-row">';
       html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
       html += '<div class="form-group">';
       html += '<label class="floating-label-activo-sm">Nombre Hermano/a</label>';
       html += '<input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hno" id="psi_hf_nombre_hno">';
       html += '</div>';
       html += '</div>';
       html += ' <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
       html += '<div class="form-group">';
       html += ' <label class="floating-label-activo-sm">Relación con Hermano</label>';
       html += ' <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_rel_hf_hno" id="psi_hf_rel_hno"></textarea>';
       html += '</div>';
       html += '</div>';
       html += '</div>';

       $('#contenedor_hermanos').append(html);
   } // agregarHermano
   $(document).ready(function(){
       /* Sacar la funcion "agregarPieza de este ámbito */
       $('.btn-agregar-hermanos').click(function(){
           agregarHermanos();
       });
   });
    /* Ponemos "agregarhijo" en el ámbito de toda la página
*/
    function agregarHijo(){
        var html = '';
        html += '<div id="contenedor_hijo">';
        html += '<div id="hijo">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '<div class="form-group">';
        html += '<label class="floating-label-activo-sm">Nombre Hijo/a</label>';
        html += '<input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hijo" id="psi_hf_nombre_hijo">';
        html += '</div>';
        html += '</div>';
        html += ' <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '<div class="form-group">';
        html += ' <label class="floating-label-activo-sm">Relación con Hijo/a</label>';
        html += ' <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_hijo" id="psi_hf_rel_hijo"></textarea>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#contenedor_hijo').append(html);
    } // agregarHermano
    $(document).ready(function(){
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-hijo').click(function(){
            agregarHijo();
        });
    });
     /* Ponemos "agregarOtro en el ámbito de toda la página

     */
     function agregarOtro(){
        var html = '';
        html += '<div id="contenedor_otro">';
        html += '<div id="otro">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '<div class="form-group">';
        html += '<label class="floating-label-activo-sm">Nombre </label>';
        html += '<input type="text" class="form-control form-control-sm" name="psi_hf_nombre_ot_per" id="psi_hf_nombre_ot_per">';
        html += '</div>';
        html += '</div>';
        html += ' <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '<div class="form-group">';
        html += ' <label class="floating-label-activo-sm">Relación </label>';
        html += ' <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_ot_per" id="psi_hf_rel_ot_per"></textarea>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#contenedor_otro').append(html);
    } // agregarOtro
    $(document).ready(function(){
        /* Sacar la funcion "agregarOtro de este ámbito */
        $('.btn-agregar-otro').click(function(){
            agregarOtro();
        });
    });
</script>
<script>
   function IsNumeric(valor) {
       var log = valor.length;
       var sw = "S";
       for (x = 0; x < log; x++) {
           v1 = valor.substr(x, 1);
           v2 = parseInt(v1);
           //Compruebo si es un valor numérico
           if (isNaN(v2)) {
               sw = "N";
           }
       }
       if (sw == "S") {
           return true;
       } else {
           return false;
       }
   }

   var primerslap = false;
   var segundoslap = false;

   function formateafecha(fecha) {
       var long = fecha.length;
       var dia;
       var mes;
       var ano;

       if ((long >= 2) && (primerslap == false)) {
           dia = fecha.substr(0, 2);
           if ((IsNumeric(dia) == true) && (dia <= 31) && (dia != "00")) {
               fecha = fecha.substr(0, 2) + "/" + fecha.substr(3, 7);
               primerslap = true;
           } else {
               fecha = "";
               primerslap = false;
           }
       } else {
           dia = fecha.substr(0, 1);
           if (IsNumeric(dia) == false) {
               fecha = "";
           }
           if ((long <= 2) && (primerslap = true)) {
               fecha = fecha.substr(0, 1);
               primerslap = false;
           }
       }
       if ((long >= 5) && (segundoslap == false)) {
           mes = fecha.substr(3, 2);
           if ((IsNumeric(mes) == true) && (mes <= 12) && (mes != "00")) {
               fecha = fecha.substr(0, 5) + "/" + fecha.substr(6, 4);
               segundoslap = true;
           } else {
               fecha = fecha.substr(0, 3);;
               segundoslap = false;
           }
       } else {
           if ((long <= 5) && (segundoslap = true)) {
               fecha = fecha.substr(0, 4);
               segundoslap = false;
           }
       }
       if (long >= 7) {
           ano = fecha.substr(6, 4);
           if (IsNumeric(ano) == false) {
               fecha = fecha.substr(0, 6);
           } else {
               if (long == 10) {
                   if ((ano == 0) || (ano < 1900) || (ano > 2100)) {
                       fecha = fecha.substr(0, 6);
                   }
               }
           }
       }

       if (long >= 10) {
           fecha = fecha.substr(0, 10);
           dia = fecha.substr(0, 2);
           mes = fecha.substr(3, 2);
           ano = fecha.substr(6, 4);
           // Año no viciesto y es febrero y el dia es mayor a 28
           if ((ano % 4 != 0) && (mes == 02) && (dia > 28)) {
               fecha = fecha.substr(0, 2) + "/";
           }
       }
       return (fecha);
   }
</script>

