
@include('general.secciones_ficha.video_llamada.seccion_jaas_container')

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
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('ficha.otro.prof.registrar_ficha_sico') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                    <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                    <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                    @csrf
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
                                        <!--RESPONSABLE-->
                                        <!--Formulario / Menor de edad-->
                                        @include('general.secciones_ficha.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--INFORMACIÓN-->
                                        @include('atencion_otros_prof.secciones_especialidad.includes.generales.motivo_cons')
                                        <!--ANTECEDENTES FAMILIARES-->
                                        @include('atencion_otros_prof.secciones_especialidad.includes.generales.antecedentes')

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="ant_gen">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ant_gen-c" aria-expanded="false" aria-controls="ant_gen-c">
                                                    Antecedentes Psico-sociales
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
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="lugar_nacimiento">Lugar de nacimiento</label>
                                                                                <input type="text" class="form-control form-control-sm" name="lugar_nacimiento" id="lugar_nacimiento">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="estado_civil">Estado civil</label>
                                                                                <select class="form-control form-control-sm" name="estado_civil" id="estado_civil">
                                                                                <option value="0">Seleccione</option>
                                                                                <option value="1">Soltero/a</option>
                                                                                <option value="2">En pareja</option>
                                                                                <option value="3">Casado/a</option>
                                                                                <option value="4">Separado/a</option>
                                                                                <option value="5">Viudo/a</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="niv_ed">Nivel de educación</label>
                                                                                <select class="form-control form-control-sm" name="niv_ed" id="niv_ed">
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
                                                                                <label class="floating-label-activo-sm" for="ocupacion">Ocupación</label>
                                                                                <input type="text" class="form-control form-control-sm" name="ocupacion" id="ocupacion">
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <label class="floating-label-activo-sm" for="religion">Religión</label>
                                                                                <input type="text" class="form-control form-control-sm" name="religion" id="religion">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--residencia-->
                                                                    <div class="tab-pane fade show" id="residencia" role="tabpanel" aria-labelledby="residencia_tab">
                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm" for="vive_con">Vive con</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="vive_con" id="vive_con"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm" for="vive_obs">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="vive_obs" id="vive_obs"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--habitos-->
                                                                    <div class="tab-pane fade show" id="psi_habitos" role="tabpanel" aria-labelledby="psi_habitos_tab">

                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm" for="alcohol">Consumo de alcohol</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alcohol" id="alcohol"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm"for="tabaco" >Consumo de tabaco</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="tabaco" id="tabaco"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm" for="sustancias_ilicitas">Consumo de sust. ilicitas</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sustancias_ilicitas" id="sustancias_ilicitas"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label class="floating-label-activo-sm" for="sexualidad">Sexualidad</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sexualidad" id="sexualidad"></textarea>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm" for="com_generales">Comentarios generales</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="com_generales" id="com_generales"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!--trabajo-->
                                                                    <div class="tab-pane fade" id="psi_trabajo" role="tabpanel" aria-labelledby="psi_trabajo_tab">

                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm" for="ant_laborales">Antecedentes laborales</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_laborales" id="ant_laborales"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!--esparcimiento-->
                                                                    <div class="tab-pane fade" id="psi_esparcimiento" role="tabpanel" aria-labelledby="psi_esparcimiento_tab">

                                                                        <div class="form-row">
                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm" for="ant_esparc" >Esparcimiento</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_esparc" id="ant_esparc"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!--OBSERVACIONES GENERALES-->
                                                                    <div class="tab-pane fade show " id="psi_obs_gen_ant" role="tabpanel" aria-labelledby="psi_obs_gen_ant_tab">
                                                                        <div class="form-row">

                                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label class="floating-label-activo-sm" for="obs_generales" >Observaciones Generales</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="obs_generales" id="obs_generales"></textarea>
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

                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="prenatal"  >Prenatal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="prenatal" id="prenatal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="natal"  >Natal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="natal" id="natal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="infancia" >Infancia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="infancia" id="infancia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="adolescencia" >Adolescencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="adolescencia" id="adolescencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="edad_adulta" >Edad adulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="edad_adulta" id="edad_adulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="ad_mayor" >Adulto mayor</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ad_mayor" id="ad_mayor"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm"for="actualidad"  >Actualidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actualidad" id="actualidad"></textarea>
                                                            </div>
                                                        </div>

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
                                                                                    <label class="floating-label-activo-sm" for="nombre_padre" >Nombre padre</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="rel_padre" >Relación con el padre</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_padre" id="rel_padre"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <h6 class="text-c-blue mb-3">MADRE</h6>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="nombre_madre" >Nombre madre</label>
                                                                                    <input type="text" class="form-control form-control-sm" namE="nombre_madre" id="nombre_madre">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="rel_madre" >Relación con la madre</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_madre" id="rel_madre"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="rel_entre_padres" >Relación entre padres</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_padres" id="rel_entre_padres"></textarea>
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
                                                                                    <label class="floating-label-activo-sm" for="tiene_hnos">¿Tiene hermanos/as?</label>
                                                                                    <select class="form-control form-control-sm" name="tiene_hnos" id="tiene_hnos" onclick="evaluar_hermanos()">
                                                                                        <option value="0" selected>No tiene</option>
                                                                                        <option value="1">Si tiene</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cantidad_hnos" >Cantidad</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="cantidad_hnos" id="cantidad_hnos" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hermanos" onclick="agregarHermanos();" disabled><i class="fas fa-save"></i> + Agregar Hermano</button>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div id="contenedor_hermanos">
                                                                                    {{-- <div id="hermanos">
                                                                                        <div class="form-row">
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm"for="nombre_hno">Nombre Hermano</label>
                                                                                                    <input type="text" class="form-control form-control-sm" name="nombre_hno" id="nombre_hno">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="floating-label-activo-sm"for="rel_hf_hno">Relación con Hermano</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hf_hno" id="rel_hf_hno"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                </div>

                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"for="rel_entre_hnos">Relación entre Hermanos</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hnos" id="rel_entre_hnos"></textarea>
                                                                                        </div>
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
                                                                                    <label class="floating-label-activo-sm" for="nombre_pareja">Nombre de pareja</label>
                                                                                    <input type="text" class="form-control form-control-sm" name="nombre_pareja" id="nombre_pareja">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="rel_pareja">Relación con la pareja</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja" id="rel_pareja"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="rel_hf_pareja_obs">Observaciones</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_hf_pareja_obs" id="rel_hf_pareja_obs"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--HIJOS-->
                                                                    <div class="tab-pane fade" id="hijos-hf" role="tabpanel" aria-labelledby="hijos-hf-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="tiene_hijos">¿Tiene hijos/as?</label>
                                                                                    <select class="form-control form-control-sm" name="tiene_hijos" id="tiene_hijos" onclick="evaluar_hijos();">
                                                                                        <option value="0" selected>No tiene</option>
                                                                                        <option value="1">Si tiene</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="cantidad_hijos">Cantidad</label>
                                                                                    <input type="number" class="form-control form-control-sm" name="cantidad_hijos" id="cantidad_hijos">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-hijo" onclick="agregarHijo();"><i class="fas fa-save"></i> + Agregar Hijos</button>

                                                                            </div>
                                                                        </div>
                                                                        <div id="contenedor_hijo">
                                                                            {{-- <div id="hijo">

                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="nombre_hijo">Nombre Hijo/a</label>
                                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">

                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm" for="rel_hijo">Relación con Nombre Hijo/a</label>
                                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                            </div> --}}
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm" for="rel_entre_hijo">Relación entre Hermanos</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hijos" id="rel_entre_hijos"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--OTRAS PERSONAS-->
                                                                    <div class="tab-pane fade" id="otros-hf" role="tabpanel" aria-labelledby="otros-hf-tab">
                                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-agregar-otro" onclick="agregarOtro();"><i class="fas fa-save"></i> + Agregar Otras personas</button>
                                                                            <input type="hidden" name="cantidad_ot_per" id="cantidad_ot_per" value="1">
                                                                        </div>
                                                                        <div id="contenedor_otro">
                                                                            <div class="otro" id="otro_1">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm"for="nombre_ot_per" >Nombre</label>
                                                                                            <input type="text" class="form-control form-control-sm" name="nombre_ot_per_1" id="nombre_ot_per_1">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                        <div class="form-group">
                                                                                            <label class="floating-label-activo-sm" for="rel_ot_per_1">Relación con (Nombre de la persona)</label>
                                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_ot_per_1" id="rel_ot_per_1"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                                                                <label class="floating-label-activo-sm" for="rel_obs_generales">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_obs_generales" id="rel_obs_generales"></textarea>
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

                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="ant_medicos">Antecedentes médicos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_medicos" id="ant_medicos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="ant_suicidio">Ant. de suicidio (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="ant_suicidio" id="ant_suicidio"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="enf_mentales">Ant. de enfermedades mentales (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="enf_mentales" id="enf_mentales" ></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="trat_psicologicos_prev">Tratamientos psicologicos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psicologicos_prev" id="trat_psicologicos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="trat_psiquiatricos_prev">Tratamientos psiquiátricos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psiquiatricos_prev" id="trat_psiquiatricos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm" for="medicacion_actual">Medicación (actual)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="medicacion_actual" id="medicacion_actual"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('atencion_otros_prof.secciones_especialidad.includes.generales.eval_psiconeuro')
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

                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="presentacion">Presentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="presentacion" id="presentacion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="conciencia">Conciencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="conciencia" id="conciencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="actitud">Actitud</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actitud" id="actitud"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="atencion_concentracion">Atención y concentración</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="atencion_concentracion" id="atencion_concentracion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="afectividad">Afectividad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="afectividad" id="afectividad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="pensamiento">Pensamiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="pensamiento" id="pensamiento"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="sensopercepcion">Sensopercepción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sensopercepcion" id="sensopercepcion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="psicomotricidad">Psicomotricidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psicomotricidad" id="psicomotricidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="sueno">Sueño</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sueno" id="sueno"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="higiene">Higiene</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="higiene" id="higiene"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm"for="alimentacion">Alimentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alimentacion" id="alimentacion"></textarea>
                                                            </div>
                                                        </div>

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
                                                                    <label class="floating-label-activo-sm" for="obs_plan_tratamiento">Obs. Plan de tratamiento</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
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

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--DIAGNÓSTICO Y PLAN DE TRATAMIENTO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="diagnostico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                    Diagnóstico e Indicaciones
                                                    </button>
                                                </div>
                                                <div id="diagnostico-c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label"for="hipotesis">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="hipotesis_certificado,eno_diagnositico_confirmado" name="hipotesis" id="hipotesis" onchange="cargarIgual('hipotesis')">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label"for="indicaciones">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label"for="pronostico">Pronóstico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pronostico" id="pronostico"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label"for="dsm_5">DSM-5  (por Nombre)</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="dsm_5_certificado,eno_dsm_5_confirmado" name="dsm_5" id="dsm_5" onchange="cargarIgual('dsm_5')">
                                                            </div>
                                                            {{--  <div class="form-group col-md-4">
                                                                <label class="floating-label"for="indicaciones">DSM-5  (por grupo Patología)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="indicaciones" id="indicaciones"></textarea>
                                                            </div>  --}}
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label"for="dsm_5p">DSM-5  (por código Patología)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="dsm_5p" id="dsm_5p"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!--GUARDAR O IMPRIMIR FICHA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--EVOLUCION-->
                        <div class="tab-pane fade" id="evolucion" role="tabpanel" aria-labelledby="evolucion">
                            @include('atencion_otros_prof.secciones_especialidad.includes.generales.evolucion')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.modal_indicar_terapia')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.m_interconsulta_psi')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.informe_psico')

{{-- video llamada --}}
<script src='https://8x8.vc/vpaas-magic-cookie-f5b9f550ffbf44928ff69685ab1a3eb1/external_api.js' async></script>
<style>html, body, #jaas-container { height: 100%; }</style>
<script type="text/javascript">
    window.onload = () => {
      const api = new JitsiMeetExternalAPI("8x8.vc", {
        roomName: "vpaas-magic-cookie-f5b9f550ffbf44928ff69685ab1a3eb1/MED-SDI",
        parentNode: document.querySelector('#jaas-container'),
                      // Make sure to include a JWT if you intend to record,
                      // make outbound calls or use any other premium features!
          jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtZjViOWY1NTBmZmJmNDQ5MjhmZjY5Njg1YWIxYTNlYjEvOWNkMTFkLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MjYyODA0NTUsImV4cCI6MTcyNjI4NzY1NSwibmJmIjoxNzI2MjgwNDUwLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtZjViOWY1NTBmZmJmNDQ5MjhmZjY5Njg1YWIxYTNlYjEiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlfSwidXNlciI6eyJoaWRkZW4tZnJvbS1yZWNvcmRlciI6ZmFsc2UsIm1vZGVyYXRvciI6dHJ1ZSwibmFtZSI6ImZyYW5jaXNjby5yb2pvLmdhbGxhcmRvIiwiaWQiOiJnb29nbGUtb2F1dGgyfDEwMTc5MTk3NjczOTY3NTQxNTQyNCIsImF2YXRhciI6Imh0dHBzOi8vaS5waW5pbWcuY29tLzU2NHgvYmQvNDAvYjAvYmQ0MGIwOGE2ZWNhMGRlYjE1ODlkZjE1ZDM2NDYzZmEuanBnIiwiZW1haWwiOiJmcmFuY2lzY28ucm9qby5nYWxsYXJkb0BnbWFpbC5jb20ifX0sInJvb20iOiIqIn0.GOrBfM3GmZHJgQpbWFVtwk1e1m0UF13dvhUwkrlqg9G6py9OgpL6I1TGf6qnOqcF5PWyitsQpWduiLnpU-VCC61u_YtXOCZN_eyQpxfxnXZaOWuT9aWi7vmnYoWQnFvmRC_BTMky1W3Lr-PaKWzxpZmaW8AwQgwTFs7ZTdMctUp-9nkKwf4u38T_kifB54OS_ZMzWJ_n2l6ZCId9U4OZSyeaaWQgxIkLd1fTOnLMmMtxViIYsUoK-r9DvjFp7pjbVPTTrAip3nHU0yuOPOJSAsa8OVpVPLA_bOr7WBF1nU3IQQH0jcZwjCrk9NP1Gwpr1AhtARLknwWFUOIeHqaufg",
          configOverwrite: {
              startWithAudioMuted: false,
              enableNoisyMicDetection: true,
              // toolbarButtons: ['hangup', 'microphone', 'camera','chat'],
              prejoinPageEnabled: true,
              // Transcription options.
              transcription: {
                  // Whether the feature should be enabled or not.
                  enabled: false,

                  // Translation languages.
                  // Available languages can be found in
                  // ./src/react/features/transcribing/translation-languages.json.
                  translationLanguages: ['en', 'es', 'fr', 'ro'],

                  // Important languages to show on the top of the language list.
                  translationLanguagesHead: ['en'],

                  // If true transcriber will use the application language.
                  // The application language is either explicitly set by participants in their settings or automatically
                  // detected based on the environment, e.g. if the app is opened in a chrome instance which
                  // is using french as its default language then transcriptions for that participant will be in french.
                  // Defaults to true.
                  useAppLanguage: true,

                  // Transcriber language. This settings will only work if "useAppLanguage"
                  // is explicitly set to false.
                  // Available languages can be found in
                  // ./src/react/features/transcribing/transcriber-langs.json.
                  preferredLanguage: 'en-US',

                  // Enables automatic turning on transcribing when recording is started
                  autoTranscribeOnRecord: false,
              },
           },
          interfaceConfigOverwrite: {
              DISABLE_DOMINANT_SPEAKER_INDICATOR: true,
              AUDIO_LEVEL_PRIMARY_COLOR: 'rgba(255,255,255,0.4)',
              AUDIO_LEVEL_SECONDARY_COLOR: 'rgba(255,255,255,0.2)',
          },
          lang: 'es',
      });
    }
  </script>
{{-- video llamada --}}

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
    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
</script>


<script>


    function evaluar_hermanos()
    {
        var valor = $('#tiene_hnos').val();
        if(valor != '')
        {
            if(valor == 0)
            {
                $('#cantidad_hnos').attr('disabled', true);
                $('#cantidad_hnos').val('');
                $('.btn-agregar-hermanos').attr('disabled', true);
                $('#contenedor_hermanos').html('');
            }
            else if(valor == 1)
            {
                $('#cantidad_hnos').attr('disabled', false);
                $('#cantidad_hnos').val('1');
                $('.btn-agregar-hermanos').attr('disabled', false);
                agregarHermanos();
            }
        }
    }

    function agregarHermanos()
    {
        var cantidad = 1;
        $('.hermanos').each(function (){
            cantidad++;
        });
        var html = '';
        html += '<div class="hermanos" id="hermanos_'+cantidad+'">';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Nombre Hermano/a</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hno_'+cantidad+'" id="psi_hf_nombre_hno_'+cantidad+'">';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Relación con Hermano</label>';
        html += '                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_rel_hf_hno_'+cantidad+'" id="psi_hf_rel_hno_'+cantidad+'"></textarea>';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_hermanos').append(html);
        $('#cantidad_hnos').val(cantidad);
    }


    function evaluar_hijos()
    {
        var valor = $('#tiene_hijos').val();
        if(valor != '')
        {
            if(valor == 0)
            {
                $('#cantidad_hijos').attr('disabled', true);
                $('#cantidad_hijos').val('');
                $('.btn-agregar-hijo').attr('disabled', true);
                $('#contenedor_hijo').html('');
            }
            else if(valor == 1)
            {
                $('#cantidad_hijos').attr('disabled', false);
                $('#cantidad_hijos').val('1');
                $('.btn-agregar-hijo').attr('disabled', false);
                agregarHijo();
            }
        }
    }
    function agregarHijo(){
        var cantidad = 1;
        $('.hijo').each(function (){
            cantidad++;
        });
        var html = '';
        html += '<div class="hijo" id="hijo_'+cantidad+'">';
        html += '   <div class="form-row">';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Nombre Hijo/a</label>';
        html += '               <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hijo_'+cantidad+'" id="psi_hf_nombre_hijo_'+cantidad+'">';
        html += '           </div>';
        html += '       </div>';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Relación con Hijo/a</label>';
        html += '               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_hijo_'+cantidad+'" id="psi_hf_rel_hijo_'+cantidad+'"></textarea>';
        html += '           </div>';
        html += '       </div>';
        html += '   </div>';
        html += '</div>';

        $('#contenedor_hijo').append(html);
        $('#cantidad_hijos').val(cantidad);
    }

    /* Ponemos "agregarOtro en el ámbito de toda la página */

    function agregarOtro(){
        var cantidad = 1;
        $('.otro').each(function (){
            cantidad++;
        });
        var html = '';
        html += '<div class="otro" id="otro_'+cantidad+'">';
        html += '   <div class="form-row">';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Nombre </label>';
        html += '               <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_ot_per_'+cantidad+'" id="psi_hf_nombre_ot_per_'+cantidad+'">';
        html += '           </div>';
        html += '       </div>';
        html += '       <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">';
        html += '           <div class="form-group">';
        html += '               <label class="floating-label-activo-sm">Relación </label>';
        html += '               <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="psi_hf_rel_ot_per_'+cantidad+'" id="psi_hf_rel_ot_per_'+cantidad+'"></textarea>';
        html += '           </div>';
        html += '       </div>';
        html += '   </div>';
        html += '</div>';

        $('#contenedor_otro').append(html);
        $('#cantidad_ot_per').val(cantidad);

    }

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

