<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_enfermera-tab" data-toggle="tab" href="#atencion_enfermera" role="tab" aria-controls="atencion_enfermera" aria-selected="true">Atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ns-tab" data-toggle="tab" href="#ns" role="tab" aria-controls="ns" aria-selected="false">Control Niño Sano</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_orl') }}" method="POST">
                    <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                    <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                    <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                    <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                    <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                    <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                    <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                    @csrf
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_enfermera" role="tabpanel" aria-labelledby="atencion_enfermera-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--FORMULARIO / MENOR DE EDAD-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--MOTIVO CONSULTA-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="motivo">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                                                        Motivo de la consulta
                                                    </button>
                                                </div>
                                                <div id="motivo_c" class="collapse" aria-labelledby="motivo" data-parent="#motivo">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                <select class="form-control form-control-sm" id="motivo" name="motivo">
                                                                    <option>Seleccione</option>
                                                                    <option>Tratamiento inyectables</option>
                                                                    <option>Vacunas</option>
                                                                    <option>Curaciones herida</option>
                                                                    <option>Curaciones escaras</option>
                                                                    <option>Sueros</option>
                                                                    <option>Otra</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <label class="floating-label-activo-sm">Anamnesis</label>
                                                                <textarea class="caja-texto form-control form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="anamnesis" id="anamnesis"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Formulario / Signos vitales y otros-->
                                        @include('general.secciones_ficha.signos_vitales')
                                        <!--Cierre: Formulario / Signos vitales y otros-->
                                        <!--CURACIONES PROCEDIMIENTOS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                        Curaciones y procedimientos
                                                    </button>
                                                </div>
                                                <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row" id="form-enf">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Curaciones y procedimientos </label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Observaciones al procedimiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ADMINISTRACIÓN DE TRATAMIENTO INYECTABLE-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="exam_esp_gin">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_gin_c" aria-expanded="false" aria-controls="exam_esp_gin_c">
                                                        Administración de Tratamiento Inyectable
                                                    </button>
                                                </div>
                                                <div id="exam_esp_gin_c" class="collapse" aria-labelledby="exam_esp_gin" data-parent="#exam_esp_gin">
                                                    <div class="card-body-aten-a">
                                                        <div id="form-orl-adulto">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-10" id="matron" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="inyec-gen_tab" data-toggle="tab" href="#inyec-gen" role="tab" aria-controls="inyec-gen" aria-selected="true">Tratamiento Inyectable</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="false">Vacunas</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="tab-content" id="matron">
                                                                        <!--INYECTABLES-->
                                                                        <div class="tab-pane fade show active" id="inyec-gen" role="tabpanel" aria-labelledby="inyec-gen_tab">
                                                                            <div class="form-row mt-3">
                                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">                                                                                    
                                                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                        <a class="nav-link-aten text-reset active " id="receta_gen-tab" data-toggle="tab" href="#receta_gen" role="tab" aria-controls="receta_gen" aria-selected="false">Receta Médica</a>
                                                                                        <a class="nav-link-aten text-reset" id="enf_inyect-tab" data-toggle="tab" href="#enf_inyect" role="tab" aria-controls="enf_inyect" aria-selected="false">Inyectable IM/IV</a>
                                                                                        <a class="nav-link-aten text-reset" id="enf_sueros-tab" data-toggle="tab" href="#enf_sueros" role="tab" aria-controls="enf_sueros" aria-selected="false">Control de sueros</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                                                    <div class="tab-content" id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade show active" id="receta_gen" role="tabpanel" aria-labelledby="receta_gen-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten d-inline my-2">Receta médica</h6>
                                                                                                    <span class="badge badge-sub d-inline">TRATAMIENTO INYECTABLE</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">                                                                                               
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <div class="alert alert-info py-1 mt-2" role="alert">Adjuntar receta</div>
                                                                                                    <!-- [ Main Content ] start -->
                                                                                                    <div class="dropzone dz-clickable" id="mis-imagenes-cons-dermato-pre" action="{{ route('profesional.imagen.carga') }}"></div>
                                                                                                    <!-- [ file-upload ] end -->
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                                                                                                    <div class="form-group">
                                                                                                        <input type="hidden" name="busc_receta" id="busc_receta" value="">
                                                                                                        <div class="switch switch-success d-inline m-r-10 mb-2">
                                                                                                            <input type="checkbox" onchange="biopsia('dermat');" id="busc_receta_check_enf" name="busc_receta_check_enf" value="">
                                                                                                            <label for="busc_receta_check_enf" class="cr"></label>
                                                                                                        </div>
                                                                                                        <label>Buscar Receta</label>

                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">ID Receta SDI</label>
                                                                                                            <input  type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_busqueda_receta" id="obs_busqueda_receta"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade show" id="enf_inyect" role="tabpanel" aria-labelledby="enf_inyect-tab">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                    <h6 class="t-aten my-2">Inyectable IM/IV</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-row">
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <label class="floating-label-activo-sm">Incidentes en procedimiento </label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                                                </div>
                                                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                                    <label class="floating-label-activo-sm"> Otras observaciones al procedimiento</label>
                                                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="tab-pane fade show" id="enf_sueros" role="tabpanel" aria-labelledby="enf_sueros-tab">
                                                                                      
                                                                                                <!--SUEROS-->
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <h6 class="t-aten my-2">Sueros e inyectables</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="floating-label-activo">Descripción</label>
                                                                                                        <textarea class="form-control form-control-sm" planceholder="Suero Tipo / hora de inicio / gotas/ min" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="floating-label-activo-sm">Otras tratamientos parenterales</label>
                                                                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Observaciones examen y control</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <div class="form-group">
                                                                                                            <label class="floating-label-activo-sm">Control de signos vitales durante el procedimiento</label>
                                                                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen mamas" data-seccion="Mamas" data-tipo="general" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_audicion" id="obs_ex_audicion"></textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                      
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--EXAMEN  CONTROL NATALIDAD-->
                                                                        @include('general.secciones_ficha.pediatria.vacunas_enfermeria')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--CONTROL DOMICILIARIO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="ctrl-domiciliario">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c_" aria-expanded="false" aria-controls="diagnostico_c">
                                                       Control Domiciliario
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c_" class="collapse" aria-labelledby="ctrl-domiciliario" data-parent="#ctrl-domiciliario">
                                                    <div class="card-body-aten-a">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="c_domic_enf" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="oral-cd-tab" data-toggle="tab" href="#oral-cd" role="tab" aria-controls="oral-cd"  aria-selected="true">Oral</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="suero-venosa-cd-tab" data-toggle="tab" href="#suero-venosa-cd" role="tab" aria-controls="suero-venosa-cd" aria-selected="false">Suero - Via venosa</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="inyect-cd-tab" data-toggle="tab" href="#inyect-cd" role="tab" aria-controls="inyect-cd" aria-selected="false">Inyectable</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="n-parenteral-cd-tab" data-toggle="tab" href="#n-parenteral-cd" role="tab" aria-controls="n-parenteral-cd" aria-selected="false">Nutrición parenteral</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="curacion-cd-tab" data-toggle="tab" href="#curacion-cd" role="tab" aria-controls="curacion-cd" aria-selected="false">Curaciones</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="ot-proc-cd-tab" data-toggle="tab" href="#ot-proc-cd" role="tab" aria-controls="ot-proc-cd" aria-selected="false">Otros procedimientos</a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content" id="c_domic_enf">
                                                                    <!--TTOORAL-->
                                                                    <div class="tab-pane fade show active" id="oral-cd" role="tabpanel"
                                                                        aria-labelledby="oral-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline mr-2">Tratamiento Oral</h6>
                                                                                     <button type="button" class="btn btn-xxs btn-info-light-c d-inline" onclick="oral_cd();">
                                                                                    + Añadir    
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Medicamento</th>
                                                                                                <th scope="col">Fecha-Hora</th>
                                                                                                <th scope="col">Observaciones</th>
                                                                                                <th scope="col">Profesional</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-wrap">Paracetamol 1gr</td>
                                                                                                <td class="text-wrap">11/09/2024 23:33</td>
                                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                </td>
                                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-wrap">Paracetamol 1gr</td>
                                                                                                <td class="text-wrap">11/09/2024 20:15</td>
                                                                                                <td class="text-wrap text-justify">Texto falso! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                </td>
                                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--TTO SUERO - VIA VENOSA-->
                                                                    <div class="tab-pane fade show" id="suero-venosa-cd" role="tabpanel"
                                                                        aria-labelledby="suero-venosa-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline mr-2">Tratamiento Suero - Via venosa</h6>
                                                                                     <button type="button" class="btn btn-xxs btn-info-light-c d-inline" onclick="ven_suero_cd();">
                                                                                    + Añadir    
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Tipo suero</th>
                                                                                                    <th scope="col">Hora inicio</th>
                                                                                                    <th scope="col">Hora término</th>
                                                                                                    <th scope="col">cc / hora</th>
                                                                                                    <th scope="col">Sitio Punción</th>
                                                                                                    <th scope="col">Observaciones</th>
                                                                                                    <th scope="col">Profesional</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="text-wrap">Suero fisiológico 500ml +300 ketoprofeno+3gr Metamizol</td>
                                                                                                    <td class="text-wrap">23:33</td>
                                                                                                    <td class="text-wrap">00:33</td>
                                                                                                    <td class="text-wrap">20 cc/hora</td>
                                                                                                    <td class="text-wrap">Extremidad superior izquierda</td>
                                                                                                    <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                    </td>
                                                                                                    <td class="text-wrap">Nombre Apellido</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--INYECTABLE-->
                                                                    <div class="tab-pane fade show" id="inyect-cd" role="tabpanel"
                                                                        aria-labelledby="inyect-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline mr-2">Tratamiento Inyectable</h6><button type="button" class="btn btn-xxs btn-info-light-c d-inline" onclick="inyect_cd();">
                                                                                    + Añadir    
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Medicamento y Dosis</th>
                                                                                                <th scope="col">Fecha-hora</th>
                                                                                                <th scope="col">Observaciones</th>
                                                                                                <th scope="col">Profesional</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-wrap">Diclofenaco 75 mg (1 ampolla)</td>
                                                                                                <td class="text-wrap">11/09/2024 11:23</td>
                                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                </td>
                                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--NUTRICION PARENTERAL-->
                                                                    <div class="tab-pane fade show" id="n-parenteral-cd" role="tabpanel"
                                                                        aria-labelledby="n-parenteral-cd-tab">
                                                                         <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline mr-2">Nutrición parenteral</h6>
                                                                                    <button type="button" class="btn btn-xxs btn-info-light-c d-inline" onclick="n_parenteral_cd();">
                                                                                    + Añadir    
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Día-Hora</th>
                                                                                                <th scope="col">Observaciones</th>
                                                                                                <th scope="col">Profesional</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-wrap">00/00/000 13:21</td>
                                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                </td>
                                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--CURACIONES-->
                                                                    <div class="tab-pane fade show" id="curacion-cd" role="tabpanel"
                                                                        aria-labelledby="curacion-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline mr-2">Curaciones</h6>
                                                                                    <button type="button" class="btn btn-xxs btn-info-light-c d-inline" onclick="curac_cd();">
                                                                                    + Añadir    
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Día-Hora</th>
                                                                                                    <th scope="col">Observaciones</th>
                                                                                                    <th scope="col">Profesional</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="text-wrap">11:30 23:33</td>
                                                                                                    <td class="text-wrap text-justify">Texto falso!! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                    </td>
                                                                                                    <td class="text-wrap">Nombre Apellido</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!--OTROS PROCEDIMIENTOS-->
                                                                    <div class="tab-pane fade show" id="ot-proc-cd" role="tabpanel"
                                                                        aria-labelledby="ot-proc-cd-tab">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <h6 class="t-aten d-inline mr-2">Otros procedimientos</h6>
                                                                                     <button type="button" class="btn btn-xxs btn-info-light-c d-inline" onclick="otros_proced_cd();">
                                                                                    + Añadir    
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-xs f-12">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Día-Hora</th>
                                                                                                    <th scope="col">Procedimiento</th>
                                                                                                    <th scope="col">Observaciones</th>
                                                                                                    <th scope="col">Profesional</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="text-wrap">00/00/000 13:21</td>
                                                                                                    <td class="text-wrap">Retiro de puntos</td>
                                                                                                    <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                                    </td>
                                                                                                    <td class="text-wrap">Nombre Apellido</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<form>
                                                            <div class="fomr-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten">Oral</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <table class="table table-xs f-12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Medicamento</th>
                                                                                <th scope="col">Fecha-Hora</th>
                                                                                <th scope="col">Observaciones</th>
                                                                                <th scope="col">Profesional</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-wrap">Diclofenaco 100mg</td>
                                                                                <td class="text-wrap">11/09/2024 23:33</td>
                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-wrap">Paracetamol 1gr</td>
                                                                                <td class="text-wrap">11/09/2024 20:15</td>
                                                                                <td class="text-wrap text-justify">Texto falso! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten">Suero - Via venosa</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <table class="table table-xs f-12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Tipo suero</th>
                                                                                <th scope="col">Hora inicio</th>
                                                                                <th scope="col">Hora término</th>
                                                                                <th scope="col">cc / hora</th>
                                                                                <th scope="col">Sitio Punción</th>
                                                                                <th scope="col">Comentarios</th>
                                                                                <th scope="col">Profesional</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-wrap">Suero fisiológico 500ml +300 ketoprofeno+3gr Metamizol</td>
                                                                                <td class="text-wrap">23:33</td>
                                                                                <td class="text-wrap">00:33</td>
                                                                                <td class="text-wrap">20 cc/hora</td>
                                                                                <td class="text-wrap">Extremidad superior izquierda</td>
                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <h6 class="t-aten">Inyectable</h6>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <table class="table table-xs f-12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Medicamento y Dosis</th>
                                                                                <th scope="col">Fecha-hora</th>
                                                                                <th scope="col">Comentarios</th>
                                                                                <th scope="col">Profesional</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-wrap">Diclofenaco 75 mg (1 ampolla)</td>
                                                                                <td class="text-wrap">11/09/2024 11:23</td>
                                                                                <td class="text-wrap text-justify">Texto falsoLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                                </td>
                                                                                <td class="text-wrap">Nombre Apellido</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <form>
                                                            <div class="form-row" hidden>
                                                                <h6 class="mb-3">I.- Responsable Tratamiento</h6>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <p class="font-italic mt-0 mb-0 text-black">
                                                                        @php
                                                                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                                                            $fecha = \Carbon\Carbon::parse(now());
                                                                            $mes = $meses[($fecha->format('n')) - 1];
                                                                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y') ;

                                                                        @endphp
                                                                        {{ $fecha }}
                                                                    </p>
                                                                </div>

                                                                <div class="form-group col-md-6" hidden>
                                                                    <label class="floating-label">Clave Responsable</label>
                                                                    <input   type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <h6 class="my-3">I.- Oral</h6>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="rn">
                                                                            <label class="custom-control-label" for="rn">Med_1</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-2">
                                                                            <label class="custom-control-label" for="mes-2">Med_2</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-4">
                                                                            <label class="custom-control-label" for="mes-4">Med_3</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-switch">
                                                                            <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                            <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label">Hora Tolerancia</label>
                                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <h6 class="my-3">II.- SUEROS E INYECTABLES</h6>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Suero Tipo/ hora de inicio /gotas/min</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="floating-label">Otras tratamientos parenterales</label>
                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                                </div>
                                                            </div>

                                                        </form>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--DIAGNÓSTICO-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="diagnostico">
                                                    <button class="accor-closed card-act-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                        Diagnóstico
                                                    </button>
                                                </div>
                                                <div id="diagnostico_c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm"  data-input_igual="descripcion_hipotesis,lic_descripcion_hipotesis" name="hip-diag_spec" id="hip-diag_spec" onchange="cargarIgual('hip-diag_spec')" >
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,lic_descripcion_cie" name="descripcion_cie_esp" id="descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('descripcion_cie_esp')">
                                                                <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,lic_descripcion_cie" name="id_descripcion_cie_esp" id="id_descripcion_cie_esp" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_descripcion_cie_esp')">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Indicaciones</label>
                                                                <input type="text" class="form-control form-control-sm" name="ind_orl" id="ind_orl">
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
                        {{--  <!--ADMINISTRACIÓN DE TRATAMIENTO INYECTABLE-->
                        <div class="tab-pane fade" id="inyectables" role="tabpanel" aria-labelledby="inyectables-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Administración de tratamiento inyectable</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--FORMULARIO / MENOR DE EDAD-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--RECETA MÉDICA-->
                                        <div class="col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="receta">
                                                    <button class="accor-closed btn card-act-open pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#receta_c" aria-expanded="false" aria-controls="receta_c">
                                                        Receta médica
                                                    </button>
                                                </div>
                                                <div id="receta_c" class="collapse" aria-labelledby="receta" data-parent="#receta">
                                                    <div class="card-body-aten-a">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Receta médica</label>
                                                                <select class="form-control form-control-sm" id="receta_iny" name="receta_iny"  onchange="evaluar_para_carga_detalle('receta_iny','div_receta_iny','imagenes_receta_iny',1);">
                                                                    <option>Seleccione</option>
                                                                    <option selected value="1">Si</option>
                                                                    <option selected value="2">No</option>
                                                                    <optgroup label="Advertencia">
                                                                        <option>Si no existe receta La responsabilidad es suya</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2" id="div_receta_iny" style="display:none">
                                                                <h6>Suba la imagen de la receta para su respaldo</h6>
                                                                <!-- [ Main Content ] start -->
                                                                <div class="dropzone" id="mis-imagenes" action="{{ route('profesional.imagen.carga') }}">
                                                                <!-- <div class="dropzone" id="mis-imagenes" action="{{ route('profesional.imagen.carga') }}" method="post"  > -->
                                                                </div>
                                                                <!-- [ file-upload ] end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--PROCEDIMIENTO-->
                                        <div class="col-md-12">
                                            <div class="card-a">
                                                <div class="card-header-a" id="proced">
                                                    <button class="accor-closed btn card-act-open pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#proced_c" aria-expanded="false" aria-controls="proced_c">
                                                        Procedimiento
                                                    </button>
                                                </div>
                                                <div id="proced_c" class="collapse" aria-labelledby="proced" data-parent="#proced">
                                                    <div class="card">
                                                        <div class="card-body-aten-a">
                                                            <div id="form-enf">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm">Incidentes en procedimiento </label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <label class="floating-label-activo-sm"> Otras observaciones al procedimiento</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div id="form-enf">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">INCIDENTES EN PROCEDIMIENTO </label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Auditívo" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oidos" id="obs_ex_oidos"></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12" style="margin-bottom: 0;">
                                                            <label class="floating-label-activo-sm"> Otras Observaciones al Procedimiento</label>
                                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Observaciones Examen Especialidad" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="bs_ex_orl" id="obs_ex_orl"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <!--TERAPIAS DOMICILIARIAS-->
                        {{--  <div class="tab-pane fade" id="atencion_terap_enf_domicilio" role="tabpanel" aria-labelledby="atencion_terap_enf_domicilio-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-3 mb-0">
                                            <h6 class="f-16 text-c-blue">Terapias domiciliarias</h6>
                                            <hr>
                                        </div>
                                    </div>
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                        <!--Formulario / Menor de edad-->
                                        @include('atencion_medica.generales.seccion_menor')
                                        <!--Cierre: Formulario / Menor de edad-->
                                        <!--Motivo consulta-->

                                        <!--EXAMEN ESPECIALIDAD ENFERMERA - PARAMETROS DE CONTROL-->
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card-a">
                                                <form>
                                                    <div class="form-row" hidden>
                                                        <h6 class="mb-3">I.- Responsable Tratamiento</h6>
                                                    </div>
                                                    <div class="form-row">
                                                        <!--<div class="form-group col-md-6">
                                                            <p class="font-italic mt-0 mb-0 text-black">
                                                                @php
                                                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                                                    $fecha = \Carbon\Carbon::parse(now());
                                                                    $mes = $meses[($fecha->format('n')) - 1];
                                                                    $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y') ;

                                                                @endphp
                                                                {{ $fecha }}
                                                            </p>
                                                        </div>-->

                                                        <div class="form-group col-md-6" hidden>
                                                            <label class="floating-label">Clave Responsable</label>
                                                            <input   type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <h6 class="my-3">I.- Oral</h6>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="rn">
                                                                    <label class="custom-control-label" for="rn">Med_1</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-2">
                                                                    <label class="custom-control-label" for="mes-2">Med_2</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-4">
                                                                    <label class="custom-control-label" for="mes-4">Med_3</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input" id="mes-6">
                                                                    <label class="custom-control-label" for="mes-6">Med_4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label">Hora Tolerancia</label>
                                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <h6 class="my-3">II.- SUEROS E INYECTABLES</h6>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Suero Tipo/ hora de inicio /gotas/min</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Otras tratamientos parenterales</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                        </div>
                                                    </div>
                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <!--ATENCIÓN NIÑO SANO ATENCIÓN VACUNAS-->
                        @include('general.secciones_ficha.pediatria.controlninosano')

                        {{--  div de botones  --}}
                        <!--GUARDAR O IMPRIMIR FICHA-->
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <input type="submit" class="btn btn-info btn-sm mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha y finalizar su consulta">
                                <input type="submit" class="btn btn-purple btn-sm mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('page-script-ficha-atencion')
<!--MODALS-->
<script>
/**TTO DOMICILIARIO ORAL**/
 function oral_cd (){
        $('#modal_oral').modal('show');
    }
/** TTO DOMICILIARIO SUERO INTRAVENOSO **/
 function ven_suero_cd (){
        $('#modal_ven_suero_cd').modal('show');
    }
/** TTO DOMICILIARIO INYECTABLE **/
 function inyect_cd (){
        $('#modal_inyect_cd').modal('show');
    }
/** TTO DOMICILIARIO CURACIONES **/
     function curac_cd (){
            $('#m_curacion_cd').modal('show');
        }
/** TTO DOMICILIARIO NUT PARENTERAL **/
     function n_parenteral_cd (){
            $('#modal_n_parenteral_cd').modal('show');
        }

/** TTO DOMICILIARIO OTROS PROCEDIMIENTOS **/
 function otros_proced_cd (){
        $('#modal_otros_proced_cd').modal('show');
    }
</script>
<script>
        $(document).ready(function() {

            $('#hip-diag_spec').keyup(function(){
                if($.trim(this.value) != ''){
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
            });

            $("#descripcion_cie_esp").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie_esp').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie_esp').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        })

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
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



        function cargarSeccion(div_destino)
        {
            {{--  var tipo = $('#'+select+'').val();  --}}
            $('#'+div_destino).html('');
            $('#form-otorrino').find('select,textarea').each(function(key, elemento){
                html ='';
                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-4">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-4">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    html +='<div class="col-md-4">Detalle</div>';
                    html +='<div class="col-md-6">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';

                }
                html +='</div>';
                $('#'+div_destino).append(html);
            });
        }
        function cambiar_div(mostrar, ocultar, label, textarea){
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

 /** MANEJO DE IMAGENES */

 var myDropzoneConsDermatoPre;
 Dropzone.options.misImagenesConsDermatoPre  = {
     init:function()
     {
         myDropzoneConsDermatoPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneConsDermatoPre, 'img_cons_dermato_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneConsDermatoPost;
 Dropzone.options.misImagenesConsDermatoPost  = {
     init:function()
     {
         myDropzoneConsDermatoPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneConsDermatoPost, 'img_cons_dermato_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneElimCicarPre;
 Dropzone.options.misImagenesElimCicarPre  = {
     init:function()
     {
         myDropzoneElimCicarPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneElimCicarPre, 'imagenes_elim_cicat_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneElimCicatPost;
 Dropzone.options.misImagenesElimCicatPost  = {
     init:function()
     {
         myDropzoneElimCicatPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneElimCicatPost, 'imagenes_elim_cicat_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneProcPielDanadaImgPre;
 Dropzone.options.misImagenesProcPielDanadaImgPre  = {
     init:function()
     {
         myDropzoneProcPielDanadaImgPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneProcPielDanadaImgPost;
 Dropzone.options.misImagenesProcPielDanadaImgPost  = {
     init:function()
     {
         myDropzoneProcPielDanadaImgPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPost, 'proc_piel_danada_img_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPost, 'proc_piel_danada_img_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneProcPielDanadaImgPre, 'proc_piel_danada_img_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesExfoliacionPre;
 Dropzone.options.misImagenesImagenesExfoliacionPre  = {
     init:function()
     {
         myDropzoneImagenesExfoliacionPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPre, 'imagenes_exfoliacion_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesExfoliacionPost;
 Dropzone.options.misImagenesImagenesExfoliacionPost  = {
     init:function()
     {
         myDropzoneImagenesExfoliacionPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesExfoliacionPost, 'imagenes_exfoliacion_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesDermabrasPre;
 Dropzone.options.misImagenesImagenesDermabrasPre  = {
     init:function()
     {
         myDropzoneImagenesDermabrasPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPre, 'imagenes_dermabras_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesDermabrasPost;
 Dropzone.options.misImagenesImagenesDermabrasPost  = {
     init:function()
     {
         myDropzoneImagenesDermabrasPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesDermabrasPost, 'imagenes_dermabras_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesLaserPre;
 Dropzone.options.misImagenesImagenesLaserPre  = {
     init:function()
     {
         myDropzoneImagenesLaserPre = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesLaserPre, 'imagenes_laser_pre');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 var myDropzoneImagenesLaserPost;
 Dropzone.options.misImagenesImagenesLaserPost  = {
     init:function()
     {
         myDropzoneImagenesLaserPost = this;
     },
     url: "{{ route('profesional.imagen.carga') }}",
     method: 'post',
     createImageThumbnails: true,
     addRemoveLinks: true,
     headers:{
         'X-CSRF-TOKEN' : CSRF_TOKEN,
         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
     },

     acceptedFiles: "image/*",
     maxFilesize: 4,
     maxFiles: 12,
     /** El texto utilizado antes de que se eliminen los archivos. */
     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

     /**
      * El texto que se agregará antes del formulario alternativo.
      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
      * ser ignorado.
      */
     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

     /**
      * Si el tamaño del archivo es demasiado grande.
      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
      */
      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

     /** Si el archivo no coincide con el tipo de archivo. */
     dictInvalidFileType: "No puedes subir archivos de este tipo.",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
     dictCancelUpload: "Cancelar carga",

     /** El texto que se muestra si una carga se canceló manualmente */
     dictUploadCanceled: "Subida cancelada.",

     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
     dictRemoveFile: "Eliminar archivo",

     /**
      * Se muestra si `maxFiles` es st y se excede.
      */
     dictMaxFilesExceeded: "No puede cargar más archivos.",

     // accept(file, done) {
     //     console.log('-------------accept-----------------------');
     //     cargar_lista_imagenes();
     //     return done();
     // },
     success: function(file, response){
         // console.log('-------------success-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');

         if (file.previewElement) {
             return file.previewElement.classList.add("dz-success");
         }
     },
     error(file, message) {
         // console.log('-------------error-----------------------');
         if (file.previewElement) {
             file.previewElement.classList.add("dz-error");
             if (typeof message !== "string" && message.error)
             {
                 message = message.error;
             }
             else
             {
                 message = message.message;
             }
             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                 node.textContent = message;
             }
         }
     },
     removedfile(file) {
         // console.log('-------------removedfile-----------------------');
         cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');
         if (file.previewElement != null && file.previewElement.parentNode != null) {
             file.previewElement.parentNode.removeChild(file.previewElement);
         }
         return this._updateMaxFilesReachedClass();
     },
     canceled: function canceled(file) {
         cargar_lista_imagenes(myDropzoneImagenesLaserPost, 'imagenes_laser_post');
         return this.emit("error", file, this.options.dictUploadCanceled);
     },
 };

 // var myDropzone ;
 // Dropzone.options.misImagenes = {
 //     init:function()
 //     {
 //         myDropzone = this;
 //     },
 //     url: "{{ route('profesional.imagen.carga') }}",
 //     method: 'post',
 //     createImageThumbnails: true,
 //     addRemoveLinks: true,
 //     headers:{
 //         'X-CSRF-TOKEN' : CSRF_TOKEN,
 //         // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
 //     },

 //     acceptedFiles: "image/*",
 //     maxFilesize: 4,
 //     maxFiles: 12,
 //     /** El texto utilizado antes de que se eliminen los archivos. */
 //     dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

 //     /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
 //     dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

 //     /**
 //      * El texto que se agregará antes del formulario alternativo.
 //      * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
 //      * ser ignorado.
 //      */
 //     dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

 //     /**
 //      * Si el tamaño del archivo es demasiado grande.
 //      * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
 //      */
 //      dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

 //     /** Si el archivo no coincide con el tipo de archivo. */
 //     dictInvalidFileType: "No puedes subir archivos de este tipo.",

 //     /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
 //     dictCancelUpload: "Cancelar carga",

 //     /** El texto que se muestra si una carga se canceló manualmente */
 //     dictUploadCanceled: "Subida cancelada.",

 //     /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
 //     dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

 //     /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
 //     dictRemoveFile: "Eliminar archivo",

 //     /**
 //      * Se muestra si `maxFiles` es st y se excede.
 //      */
 //     dictMaxFilesExceeded: "No puede cargar más archivos.",

 //     // accept(file, done) {
 //     //     console.log('-------------accept-----------------------');
 //     //     cargar_lista_imagenes();
 //     //     return done();
 //     // },
 //     success: function(file, response){
 //         // console.log('-------------success-----------------------');
 //         cargar_lista_imagenes();

 //         if (file.previewElement) {
 //             return file.previewElement.classList.add("dz-success");
 //         }
 //     },
 //     error(file, message) {
 //         // console.log('-------------error-----------------------');
 //         if (file.previewElement) {
 //             file.previewElement.classList.add("dz-error");
 //             if (typeof message !== "string" && message.error)
 //             {
 //                 message = message.error;
 //             }
 //             else
 //             {
 //                 message = message.message;
 //             }
 //             for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
 //                 node.textContent = message;
 //             }
 //         }
 //     },
 //     removedfile(file) {
 //         // console.log('-------------removedfile-----------------------');
 //         cargar_lista_imagenes();
 //         if (file.previewElement != null && file.previewElement.parentNode != null) {
 //             file.previewElement.parentNode.removeChild(file.previewElement);
 //         }
 //         return this._updateMaxFilesReachedClass();
 //     },
 //     canceled: function canceled(file) {
 //         cargar_lista_imagenes();
 //         return this.emit("error", file, this.options.dictUploadCanceled);
 //     },
 // };



 var lista_imagenes = [];
 var lista_imagenes = {};
 function cargar_lista_imagenes(obj_dropzone, alias_examen)
 {
     // console.log('--------------cargar_lista_imagenes----------------------');
     lista_imagenes[alias_examen] = [];
     let temp  = obj_dropzone.getAcceptedFiles();
     $.each(temp, function( index, value )
     {
         if(value.status == "success")
         {
             if(value.xhr !== undefined)
             {
                 var img_temp = JSON.parse(value.xhr.response);
                 lista_imagenes[alias_examen][index] = [
                     url=img_temp.img.url,
                     nombre_origian= img_temp.img.original_file_name,
                     nombre_img = img_temp.img.nombre_img,
                     file_extension = img_temp.img.file_extension,
                 ];
                 $('#input_lista_imagenes').val('');
                 $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
             }
         }
     });
 }

 /** MANEJO DE IMAGENES */

</script>
@endsection


