<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
					<ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
						<li class="nav-item-secciones">
							<a  class="nav-secciones active text-uppercase" id="atencion-diagnostica-tab" data-toggle="tab" href="#atencion-diagnostica" role="tab" aria-controls="atencion-diagnostica" aria-selected="true">Atención especialidad</a>
						</li>
						<li class="nav-item-secciones">
							<a onclick="dame_atencion_sico()" class="nav-secciones text-uppercase" id="atencion_sicosocial-tab" data-toggle="tab" href="#atencion_sicosocial" role="tab" aria-controls="atencion_sicosocial" aria-selected="false">Evaluación Psicosocial</a>
						</li>
                        @if($tiene_controles == 1)
						<li class="nav-item-secciones">
								<a class="nav-secciones  text-uppercase" onclick="dame_control()" id="evolucion-tab" data-toggle="tab" href="#evolucion" role="tab" aria-controls="evolucion" aria-selected="true">Evolución</a>
						</li>
                        <li class="nav-item-secciones">
								<a class="nav-secciones  text-uppercase" onclick="dame_historial_controles()" id="evolucion-tab" data-toggle="tab" href="#historial_evolucion" role="tab" aria-controls="historial_evolucion" aria-selected="true">Historial Evolución</a>
						</li>
                        @endif
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
                <div class="tab-content" id="ficha-ad-terapia">
                    <!--ATENCIÓN  DIAGNOSTICA-->
                    <div class="tab-pane fade show active" id="atencion-diagnostica" role="tabpanel" aria-labelledby="atencion-diagnostica">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Atención diagnóstica</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--ANTECEDENTES GENERALES-->
                                    <!--MOTIVO CONSULTA-->
											<!--RESPONSABLE-->
											<!--Formulario / Menor de edad-->
											@include('general.secciones_ficha.seccion_menor')
											<!--Cierre: Formulario / Menor de edad-->
											<!--INFORMACIÓN-->
											@include('atencion_otros_prof.secciones_especialidad.includes.generales.motivo_cons')
                                    {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="ant-generales">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ant-generales-c" aria-expanded="false" aria-controls="ant-generales-c">
                                                  Antecedentes generales
                                                </button>
                                            </div>
                                            <div id="ant-generales-c" class="collapse" aria-labelledby="ant-generales" data-parent="#ant-generales">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Estado civil</label>
                                                                <select class="form-control form-control-sm" name="to_estado_civil" id="to_estado_civil">
                                                                  <option>Seleccione</option>
                                                                  <option>Soltero/a</option>
                                                                  <option>En pareja</option>
                                                                  <option>Casado/a</option>
                                                                  <option>Separado/a</option>
                                                                  <option>Viudo/a</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Nivel de educación</label>
                                                                <select class="form-control form-control-sm" name="to_niv_ed" id="to_niv_ed">
                                                                  <option>Seleccione</option>
                                                                  <option>Básica incompleta</option>
                                                                  <option>Básica completa</option>
                                                                  <option>Ens. Media incompleta</option>
                                                                  <option>Ens. Media completa</option>
                                                                  <option>Universitaria incompleta</option>
                                                                  <option>Universitaria completa</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Lugar de nacimiento</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_lugar_nacimiento" id="to_lugar_nacimiento">
                                                            </div>

                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Ambiente Laboral</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_ocupacion_amb" id="to_ocupacion_amb">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Ocupación</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_ocupacion" id="to_ocupacion">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Religión</label>
                                                                <input type="text" class="form-control form-control-sm" name="to_religion" id="to_religion">
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}

                                    <!--RESIDENCIA-->
                                    {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="residencia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#residencia-c" aria-expanded="false" aria-controls="residencia-c">
                                                Condiciones de   Residencia
                                                </button>
                                            </div>
                                            <div id="residencia-c" class="collapse" aria-labelledby="residencia" data-parent="#residencia">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                           <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Vive con</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="to_vive_con" id="to_vive_con"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adaptada a condición ?</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="to_vive_obs" id="to_vive_obs"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <!--HISTORIA FAMILIAR-->
                                    {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="hist-familiar">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#hist-familiar-c" aria-expanded="false" aria-controls="hist-familiar-c">
                                                  Historia familiar / personas significativas
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
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con el padre</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_padre" id="rel_padre"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <h6 class="text-c-blue mb-3">MADRE</h6>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre madre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_madre" id="nombre_madre">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con la madre</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_madre" id="rel_madre"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre padres</label>
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
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">¿Tiene hermanos/as?</label>
                                                                                <select class="form-control form-control-sm" name="tiene_hnos" id="tiene_hnos">
                                                                                    <option>Seleccione</option>
                                                                                    <option>No tiene</option>
                                                                                    <option>Si tiene</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                                                <input type="number" class="form-control form-control-sm" name="cantidad_hnos" id="cantidad_hnos">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <button type="button" class="btn btn-sm btn-outline-primary btn-block">Añadir</button>
                                                                            <!--Cuando el paciente dice la cantidad, se presiona el boton AÑADIR, automaticamente se agregan los inputs
                                                                                    nombre y relacion por cada hermano ingresado-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hermano/a</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hno" id="nombre_hno">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con Pepita</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hno" id="rel_hno"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hermano/a</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hno" id="nombre_hno">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con (primer nombre de hno/a)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="nombre_hno" id="nombre_hno"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre hermanos</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hnos" id="rel_entre_hnos"></textarea>
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
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_pareja" id="nombre_pareja">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con la pareja</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja" id="rel_pareja"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja_obs" id="rel_pareja_obs"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--HIJOS-->
                                                                <div class="tab-pane fade" id="hijos-hf" role="tabpanel" aria-labelledby="hijos-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <h6 class="text-c-blue mb-3 col-lg-3 col-xl-3">HIJOS</h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">¿Tiene hijos/as?</label>
                                                                                <select class="form-control form-control-sm" name="tiene_hijos" id="tiene_hijos">
                                                                                    <option>Seleccione</option>
                                                                                    <option>No tiene</option>
                                                                                    <option>Si tiene</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Cantidad</label>
                                                                                <input type="number" class="form-control form-control-sm" name="cantidad_hijos" id="cantidad_hijos">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                            <button type="button" class="btn btn-sm btn-outline-primary btn-block">Añadir</button>
                                                                            <!--Cuando el paciente dice la cantidad, se presiona el boton AÑADIR, automaticamente se agregan los inputs
                                                                                    nombre y relacion por cada hijo/a ingresado-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hij@</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con Nombre hij@</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre Hij@</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con nombre hij@</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación entre hij@</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_entre_hijos" id="rel_entre_hijos"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--OTRAS PERSONAS-->
                                                                <div class="tab-pane fade" id="otros-hf" role="tabpanel" aria-labelledby="otros-hf-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <h6 class="text-c-blue mb-3">OTRAS PERSONAS <a href="#" class="badge badge-light-primary">+ Añadir</a></h6>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con (Nombre de la persona)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_hijo" id="nombre_hijo">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Relación con (Nombre de la persona)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="rel_hijo" id="rel_hijo"></textarea>
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
                                                                            <label class="floating-label-activo-sm">Observaciones</label>
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
                                    </div>  --}}
                                    <!--ANTECEDENTES-->
                                    {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="antecedentes">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                  Hábitos psicobiológicos
                                                </button>
                                            </div>
                                            <div id="antecedentes-c" class="collapse" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Consumo de alcohol</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alcohol" id="alcohol"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Consumo de tabaco</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="tabaco" id="tabaco"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Consumo de sust. ilicitas</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sustancias_ilicitas" id="sustancias_ilicitas"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sexualidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sexualidad" id="sexualidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Comentarios generales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="com_generales" id="com_generales"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <!--AVD-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="a-med">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#a-med-c" aria-expanded="false" aria-controls="a-med-c">
                                                  Funcionalidad y Actividades de la vida diaria (AVD)
                                                </button>
                                            </div>
                                            <div id="a-med-c" class="collapse" aria-labelledby="a-med" data-parent="#a-med">
                                                <div class="card-body-aten-a">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset active" id="bertel-tab" data-toggle="tab" href="#bertel" role="tab" aria-controls="bertel" aria-selected="true">ABVD indice de Barthel</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="lawton-tab" data-toggle="tab" href="#lawton" role="tab" aria-controls="lawton" aria-selected="false">AIVD Escala de Lawton</a>
                                                                </li>
                                                                  <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="prot_ortesis-tab" data-toggle="tab" href="#prot_ortesis" role="tab" aria-controls="prot_ortesis" aria-selected="false">Protesís/Ortesís</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link-aten text-reset" id="contexto-tab" data-toggle="tab" href="#contexto" role="tab" aria-controls="contexto" aria-selected="false">Contexto Vida diaria</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="avd-contenido">
                                                                <!--avd-->
                                                                <div class="tab-pane fade show active" id="bertel" role="tabpanel" aria-labelledby="bertel-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Alimentación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Baño/Ducha</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Vestuario</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Higiene/Aséo</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Deposición</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Micción</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Uso WC</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Traslado sillón/cama</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Deambulación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Escaleras</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>TOTAL</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade show" id="lawton" role="tabpanel" aria-labelledby="lawton-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Uso Teléfono</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Compras</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Preparación Comida</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Cuidados de casa</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Lavado de Ropa</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Uso de trasporte</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Medicación</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>Manejo de dinero</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>ABVD --> Katz</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <h6>TOTAL</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">bas</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ingreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Egreso</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 1</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">SEG 2</label>
                                                                                <input type="text" class="form-control form-control-sm" name="nombre_padre" id="nombre_padre">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <!--protesis-->
                                                                <div class="tab-pane fade show" id="prot_ortesis" role="tabpanel" aria-labelledby="prot_ortesis-tab">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                                <select name="usa_audifono" id="usa_audifono" data-titulo="Usa Audífono" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si OD</option>
                                                                                    <option value="3">Si OI</option>
                                                                                    <option value="4">Si Ambos</option>
                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"  id="div_detalle_usa_audifono" style="display:none">
                                                                                <label class="floating-label-activo-sm">Usa Audífono</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="audifono" id="audifono"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                                <select name="apreciacion_auditiva" id="apreciacion_auditiva" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Aceptable</option>
                                                                                    <option value="2">Deficiente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_detalle_apreciacion_auditiva" style="display:none">
                                                                                <label class="floating-label-activo-sm">Apreciación Auditiva</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_auditiva_def" id="aprec_auditiva_def"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Usa Lentes</label>
                                                                                <select name="usa_lentes" id="usa_lentes" data-titulo="Usa Audífono" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_lentes','div_detalle_usa_lentes','obs_lentes',5)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si Cerca</option>
                                                                                    <option value="3">Si Lejos</option>
                                                                                    <option value="4">Si Bifocales</option>
                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"  id="div_detalle_usa_lentes" style="display:none">
                                                                                <label class="floating-label-activo-sm">Lentes</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_lentes" id="obs_lentes"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Apreciación Visual</label>
                                                                                <select name="apreciacion_visual" id="apreciacion_visual" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('apreciacion_visual','div_detalle_apreciacion_visual','aprec_visual_def',2)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Aceptable</option>
                                                                                    <option value="2">Deficiente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_detalle_apreciacion_visual" style="display:none">
                                                                                <label class="floating-label-activo-sm">Apreciación Visual</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_visual_def" id="aprec_visual_def"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Usa Protesis Dental</label>
                                                                                <select name="usa_protesis_dent" id="usa_protesis_dent" data-titulo="Usa protesis_dent" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('usa_protesis_dent','div_detalle_usa_protesis_dent','protesis_dent',5)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">No</option>
                                                                                    <option value="2">Si parcial removible</option>
                                                                                    <option value="3">Si total</option>
                                                                                    <option value="4">Si Ambas removibles</option>
                                                                                    <option value="5">Anotar Observaciones</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group"  id="div_detalle_usa_protesis_dent" style="display:none">
                                                                                <label class="floating-label-activo-sm">Usa Protesis Dental</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Usa Audífono" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="protesis_dent" id="protesis_dent"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Ajuste prótesis</label>
                                                                                <select name="ajuste_protesis" id="ajuste_protesis" data-titulo="Ajuste_protesis" data-seccion="Oídos Audición" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('ajuste_protesis','div_detalle_ajuste_protesis','obs_ajuste_protesis',2)">
                                                                                    <option value="0">Seleccione</option>
                                                                                    <option value="1">Aceptable</option>
                                                                                    <option value="2">Deficiente</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" id="div_detalle_ajuste_protesis" style="display:none">
                                                                                <label class="floating-label-activo-sm">Ajuste prótesis (Obs)</label>
                                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Auditiva" data-seccion="Oídos Audición" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_ajuste_protesis" id="obs_ajuste_protesis"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--contexto-->
                                                                <div class="tab-pane fade show" id="contexto" role="tabpanel" aria-labelledby="contexto-tab">

                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>VIVIENDA</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Casa</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Departamento</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Piso</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm"> N° Pisos</label>
                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Ascensor</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Escaleras</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>MOVILIDAD</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>bastón</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Muletas</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Andador</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>SSRR</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>SSRR Eléc.</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Scooter</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>BAÑO</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Tina</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Silla en ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Barra en ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>WC.elevado</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Wc.con barras</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>lavamanos/barra</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Tabla/Ducha</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Tina con Barras</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Otras Observaciones</label>
                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div class="form-group text-center">
                                                                                <h6>VIDA DIARIA</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Alcanzador</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Abotonador</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Adap. Calcetas</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Mangos Alargados</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Mangos Engrosados</label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Adaptador Universal</label>
                                                                            </div>

                                                                        </div>


                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Reborde de platos</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Cuchara especial</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                            <div class="form-group">
                                                                                <div class="switch switch-success d-inline m-r-10">
                                                                                    <input type="checkbox" onchange="biopsia('dermat');" id="biopsia_check_dermat" name="biopsia_check_dermat" value="">
                                                                                    <label for="biopsia_check_dermat" class="cr"></label>
                                                                                </div>
                                                                                <label>Vasos especiales</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                            <div class="form-group">
                                                                                <label class="floating-label-activo-sm">Otras Observaciones</label>
                                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp" id="n_pieza_ex_pp">
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="form-group">
                                                                            <label class="floating-label-activo-sm">Observaciones Generales</label>
                                                                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="rel_pareja_obs" id="rel_pareja_obs"></textarea>
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
                                    {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="prenatal" id="prenatal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Natal</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="natal" id="natal"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Infancia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="infancia" id="infancia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adolescencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="adolescencia" id="adolescencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Edad adulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="edad_adulta" id="edad_adulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Adulto mayor</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ad_mayor" id="ad_mayor"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Actualidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actualidad" id="actualidad"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--ANTECEDENTES LABORALES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="laboral">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#laboral-c" aria-expanded="false" aria-controls="laboral-c">
                                                  Antecedentes laborales
                                                </button>
                                            </div>
                                            <div id="laboral-c" class="collapse" aria-labelledby="laboral" data-parent="#laboral">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Antecedentes laborales</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_laborales" id="ant_laborales"></textarea>
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
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="presentacion" id="presentacion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Conciencia</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="conciencia" id="conciencia"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Actitud</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="actitud" id="actitud"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Atención y concentración</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="antencion_concentracion" id="antencion_concentracion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Afectividad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="afectividad" id="afectividad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Pensamiento</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="pensamiento" id="pensamiento"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sensopercepción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sensopercepcion" id="sensopercepcion"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Psicomotricidad</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="psicomotricidad" id="psicomotricidad"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Sueño</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="sueno" id="sueno"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Higiene</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="higiene" id="higiene"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Alimentación</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="alimentacion" id="alimentacion"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                   
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
                                                            <div class="form-group col-md-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="tratamiento" id="tratamiento" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="tratamiento_check" name="tratamiento_check" value="" />
                                                                                <label for="tratamiento_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Solo Control</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="lentes" id="lentes" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="lentes_check" name="lentes_check" value="" />
                                                                                <label for="lentes_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Terápia Individual</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="procedimiento" id="procedimiento" value="">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="procedimiento_check" name="procedimiento_check" value="" />
                                                                                <label for="procedimiento_check" class="cr"></label>
                                                                            </div>
                                                                            <label>Terápia Grupal</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Obs. Plan de tratamiento</label>
                                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <button type="button" class="btn btn-outline-primary btn-block btn-sm " onclick="ind_terapia_to();"><i class="feather icon-plus"></i> Plan de tratamiento</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="ind_ic_to();"><i class="feather icon-plus"></i> Indicar Interconsulta</button>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <button type="button" class="btn btn-primary-light btn-block btn-sm mt-1" onclick="informe_tera();"><i class="feather icon-plus"></i> Enviar Informe</button>
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
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten-a">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <input type="text" class="form-control form-control-sm" name="hip-diag" id="hip-diag">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label">Diagnóstico CIE-10</label>
                                                                <input type="text" class="form-control form-control-sm" name="cie10" id="cie10">
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
                     <div class="tab-pane fade" id="atencion_sicosocial" role="tabpanel" aria-labelledby="atencion_sicosocial">
                        @include('general.secciones_ficha.siquiatria.eval_sicosocial')
                    </div>
                     <!--EVOLUCION-->
                    <div class="tab-pane fade" id="evolucion" role="tabpanel" aria-labelledby="evolucion">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
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
                                    <!--MOTIVO CONSULTA-->
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
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
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
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.terapia_ocup.modal_indicar_terapia')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.terapia_ocup.m_interconsulta_to')
@include('atencion_otros_prof.formularios.modal_atencion_especialidad.terapia_ocup.informe_tera')
<!-- -->
@section('page-script-ficha-atencion')
    <script>
         var archivosSubidos = [];
        document.addEventListener('DOMContentLoaded', function () {
            const btnGrabar = document.getElementById('btnGrabarvoz');
            const campoTexto = document.getElementById('com_inf_fono');
            const estado = document.getElementById('estado_voz_voz');

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

            if (!SpeechRecognition) {
                btnGrabar.disabled = true;
                estado.textContent = 'Navegador no compatible con dictado por voz.';
                return;
            }

            const reconocimiento = new SpeechRecognition();
            reconocimiento.lang = 'es-CL';
            reconocimiento.continuous = false;
            reconocimiento.interimResults = false;

            btnGrabar.addEventListener('click', () => {
                reconocimiento.start();
                estado.textContent = '🎙️ Escuchando...';
            });


            reconocimiento.onresult = function (event) {
                const resultado = event.results[0][0].transcript;
                campoTexto.value += (campoTexto.value ? ' ' : '') + resultado;
            };

            reconocimiento.onend = function () {
                estado.textContent = '✅ Dictado finalizado.';
            };

            reconocimiento.onerror = function (event) {
                estado.textContent = '❌ Error: ' + event.error;
            };
            iniciarVozIndex();
        });


        function iniciarVozIndex(){
            const btnGrabarIndex = document.getElementById('btnGrabarvozIndex');
            const campoTextoIndex = document.getElementById('evol_indicaciones');
            const estadoIndex = document.getElementById('estado_voz_index');

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

            if (!SpeechRecognition) {
                btnGrabarIndex.disabled = true;
                estadoIndex.textContent = 'Navegador no compatible con dictado por voz.';
                return;
            }

            const reconocimiento = new SpeechRecognition();
            reconocimiento.lang = 'es-CL';
            reconocimiento.continuous = false;
            reconocimiento.interimResults = false;

            btnGrabarIndex.addEventListener('click', () => {
                reconocimiento.start();
                estadoIndex.textContent = '🎙️ Escuchando...';
            });


            reconocimiento.onresult = function (event) {
                const resultado = event.results[0][0].transcript;
                campoTextoIndex.value += (campoTextoIndex.value ? ' ' : '') + resultado;
            };

            reconocimiento.onend = function () {
                estadoIndex.textContent = '✅ Dictado finalizado.';
            };

            reconocimiento.onerror = function (event) {
                estadoIndex.textContent = '❌ Error: ' + event.error;
            };
        }
    </script>
<script>
	$(document).ready(function() {
            $("#descripcion_cie").autocomplete({
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
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });


			 $("#descripcion_dsm-5").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('profesional.getDSM-5') }}",
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
                    $('#descripcion_dsm-5').val(ui.item.label); // display the selected text
                    $('#id_descripcion_dsm-5').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
</script>
@endsection
<script>
    function amplificar_imagen_psicologia(path){
        $('#modal_imagen_psicologia').modal('show');

        $('.zoom-container').on('mousemove', function (e) {
            const $img = $(this).find('img');
            const offsetX = e.offsetX;
            const offsetY = e.offsetY;
            const width = $(this).width();
            const height = $(this).height();
            const xPercent = (offsetX / width) * 100;
            const yPercent = (offsetY / height) * 100;

            $img.css('transform-origin', `${xPercent}% ${yPercent}%`);
        });

        $('#imagen_psico_zoom').attr('src', path);
    }

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

    function evaluar_hermanos() {
        var valor = $('#tiene_hnos').val();

        if (valor == '0') {
            $('#cantidad_hnos').attr('disabled', true).val('');
            $('.btn-agregar-hermanos').attr('disabled', true);
            $('#contenedor_hermanos').html('');
        } else if (valor == '1') {
            if ($('.hermanos').length === 0) {
                agregarHermanos(); // Solo agrega si no hay ninguno
            }
            $('#cantidad_hnos').attr('disabled', true);
            $('.btn-agregar-hermanos').attr('disabled', false);
        }
    }


    function agregarHermanos() {
        var cantidad = $('.hermanos').length;
        if (cantidad >= 10) {
            swal({
                title:'Error',
                text:'No se pueden agregar más de 10 hermanos',
                icon:'error'
            });
            return;
        }

        cantidad++;
        var html = '';
        html += '<div class="hermanos" id="hermanos_' + cantidad + '">';
        html += '    <div class="form-row">';
        html += '        <div class="col-sm-12 col-md-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Nombre Hermano/a</label>';
        html += '                <input type="text" class="form-control form-control-sm" name="psi_hf_nombre_hno_ev_' + cantidad + '" id="psi_hf_nombre_hno_ev_' + cantidad + '">';
        html += '            </div>';
        html += '        </div>';
        html += '        <div class="col-sm-12 col-md-6">';
        html += '            <div class="form-group">';
        html += '                <label class="floating-label-activo-sm">Relación con Hermano</label>';
        html += '                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="psi_rel_hf_hno_ev_' + cantidad + '" id="psi_hf_rel_hno_ev_' + cantidad + '"></textarea>';
        html += '            </div>';
        html += '        </div>';
        html += '    </div>';
        html += '</div>';

        $('#contenedor_hermanos').append(html);
        $('#cantidad_hnos').val(cantidad);
    }


    function quitarHermano() {
        var cantidad = $('.hermanos').length;

        if (cantidad > 0) {
            $('#hermanos_' + cantidad).remove();
            cantidad--;
            $('#cantidad_hnos').val(cantidad);
        }

        if (cantidad === 0) {
            $('#tiene_hnos').val('0');
            evaluar_hermanos();
        }
    }




    function evaluar_hijos() {
        var valor = $('#tiene_hijos').val();

        if (valor == '0') {
            $('#cantidad_hijos').attr('disabled', true).val('');
            $('.btn-agregar-hijos').attr('disabled', true);
            $('#contenedor_hijo').html('');
        } else if (valor == '1') {
            if ($('.hijos').length === 0) {
                agregarHijo();
            }
            $('#cantidad_hijos').attr('disabled', true);
            $('.btn-agregar-hijos').attr('disabled', false);
        }
    }

    function agregarHijo(){
        var cantidad = $('.hijos').length;
        if (cantidad >= 10) {
            swal({
                title:'Error',
                text:'No se pueden agregar más de 10 hermanos',
                icon:'error'
            });
            return;
        }

        cantidad++;
        var html = '';
        html += '<div class="hijos" id="hijo_'+cantidad+'">';
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

    function quitarHijo() {
        var cantidad = $('.hijos').length;

        if (cantidad > 0) {
            $('#hijo_' + cantidad).remove();
            cantidad--;
            $('#cantidad_hijos').val(cantidad);
        }

        if (cantidad === 0) {
            $('#tiene_hijos').val('0');
            evaluar_hijos();
        }
    }


    /* Ponemos "agregarOtro en el ámbito de toda la página */

    function agregarOtro(){
        var cantidad = $('.otro').length;
        if (cantidad >= 10) {
            swal({
                title:'Error',
                text:'No se pueden agregar más de 10 otros',
                icon:'error'
            });
            return;
        }

        cantidad++;
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

    function quitarOtro(){
        var cantidad = $('.otro').length;

        if (cantidad > 0) {
            $('#otro_' + cantidad).remove();
            cantidad--;
            $('#cantidad_otros').val(cantidad);
        }

        if (cantidad === 0) {
            $('#tiene_otros').val('0');
        }
    }

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

    function evaluar_opcion(opcion) {
        console.log(opcion);
        $('#titulo_planificacion').html(opcion);
    }
</script>
<script>
        /*-Agendar hora medica-*/
        function hora_medica_pedir(id_profesional, id_lugar_atencion, tipo_agenda = null){

            $('#modal_reserva_hora_lugar_atencion').val('');
            $('#modal_reserva_dias_atencion').val('');
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_hora_lista_horas').html('');
            // asigno id profesioanl
            $('#modal_reserva_hora_id_profesional').val(id_profesional);
            $('#modal_reserva_hora_tipo_agenda').val(tipo_agenda);

            carga_calendario_profesional_pedir();

            // cargo lugares de atencion  y asigno lugar con hora mas proxima
            lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion', id_lugar_atencion)
            $('#indicar_terapia').modal('show');
        }

        

        function carga_calendario_profesional_pedir()
        {
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_fecha').attr('disabled',true);
            $('#modal_reserva_hora_lista_horas').html('');

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {


                    {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                    if(data.registros.horario_agenda_laboral != '')
                    {
                        console.log(data);
                        let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                        var dias_activos = data.registros.horario_agenda_laboral.split(',');
                        var dias_texto = '';
                        var cant = 0;

                        $.each(dias_activos, function(index, value)
                        {
                            if(cant>0)
                                dias_texto += ' - '+dias[value];
                            else
                                dias_texto += dias[value];

                            cant++;
                        });

                        $('#modal_reserva_dias_atencion').html(dias_texto);

                        /** calendario */
                        $('#modal_reserva_fecha').attr('disabled',false);

                        $("#modal_reserva_fecha").flatpickr({
                            "disable": [
                                function(date) {
                                    return !dias_activos.includes(String(date.getDay()));
                                }
                            ],
                            minDate: "today",
                            maxDate: new Date(Date.now() + 60 * 24 * 60 * 60 * 1000), // 60 días desde hoy
                            locale: {
                                firstDayOfWeek: 1,
                                weekdays: {
                                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                },
                                months: {
                                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                                longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                },
                            },
                        });
                        /** fin calendario */

                    }
                    else
                    {
                        $('#modal_reserva_dias_atencion').html('NO INFORMADOS');
                        $('#modal_reserva_fecha').attr('disabled',true);
                        $('#modal_reserva_fecha_seleccionada').html('');
                    }

                } else {
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function lugar_atencion_profesional(element, div_destino, value_init = '')
        {
            let id_profesional = $(element).val();
            let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        {{--  console.log(data);  --}}
                        let input_lugar_atencion = $('#'+div_destino);

                        input_lugar_atencion.find('option').remove();
                        input_lugar_atencion.append('<option value="">Seleccione</option>');
                        $(data.registros).each(function(i, v) { // indice, valor
                            input_lugar_atencion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                        if(value_init != '')
                        {
                            input_lugar_atencion.val(value_init);
                            carga_calendario_profesional_pedir();
                        }

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_horas_disponibles_calendario_profesion(dia)
    {

        let id_profesional = $('#modal_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
        console.log('cargar_horas_disponibles_calendario_profesion');
        console.log(dia);

        let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                dia: dia,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1) {
                $('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                $('#modal_reserva_hora_lista_horas').html('');
                $.each(data.registros, function(index, value)
                {
                    var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                    var html = '';
                    html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                    html += ''+hr1;
                    html += '</div>';

                    $('#modal_reserva_hora_lista_horas').append(html);
                });

            } else {
                // alert('No se pudo Cargar las ciudades');
                $('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function generar_reserva_cita(hora)
    {
        console.log('generar_reserva_cita');
        $('.div_rut_buscar').hide();
        $('#form_reseva_de_horas').hide();
        $('#reserva_datos_paciente').hide();
        $('#reserva_agregar_paciente_hora').hide();

        $('#indicar_terapia').modal('hide');

        let id_profesional = $('#modal_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
        let fecha_consulta = $('#modal_reserva_fecha').val();
        $('#reserva_hora_id_profesional').val('');
        $('#reserva_hora_id_lugar_atencion').val('');
        $('#reserva_hora_fecha_consulta').val('');
        $('#reserva_hora_hora_consulta').val('');

        let url = "{{ route('paciente.get.informacion') }}";
        var datos = {};
        var id_dependiente_activo = '{{ $paciente->id }}';

        if(id_dependiente_activo != '')
            datos.id_dependiente_activo = id_dependiente_activo;

        $.ajax({
            url: url,
            type: "get",
            data: datos,
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $('.div_rut_buscar').hide();
                $('#form_reseva_de_horas').show();
                $('#reserva_datos_paciente').show();
                $('#reserva_agregar_paciente_hora').hide();

                $('#agenda_agregar_paciente').modal('show');

                $('#reserva_hora_id_profesional').val(id_profesional);
                $('#reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                $('#reserva_hora_fecha_consulta').val(fecha_consulta);
                $('#reserva_hora_hora_consulta').val(hora);

                $('#reserva_hora_id_paciente').val(data.registro.id);

                $('#reserva_rut_paciente').html(data.registro.rut);
                $('#reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                $('#reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                if (data.registro.sexo == 'M') {
                    $('#reserva_sexo').text('Masculino');
                } else {
                    $('#reserva_sexo').text('Femenino');
                }
                $('#reserva_convenio').html(data.registro.prevision.nombre);
                $('#reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#reserva_hora_email').html(data.registro.email);
                $('#reserva_hora_telefono').html(data.registro.telefono_uno);



            }
            else
            {
                swal({
                    title: "Debe completar los datos de Inscripción",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  GENERAR HORA USUARIO EXISTENTE  --}}
    function agendar_hora() {

        let url = "{{ route('paciente.solicitar.hora') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#reserva_hora_fecha_consulta').val()+' '+$('#reserva_hora_hora_consulta').val();
        let reserva_hora_id = $('#reserva_hora_id_paciente').val();
        let id_profesional = $('#reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#reserva_hora_id_lugar_atencion').val();
        let id_asistente = $('#reserva_hora_id_asistente').val();
        let origen = $('#reserva_hora_origen').val();

        let tipo_agenda = $('#modal_reserva_hora_tipo_agenda').val();
        var tipo_agenda_text = 'C';

        console.log(tipo_agenda);
        console.log(tipo_agenda_text);

        switch (tipo_agenda) {
            case '1':
                tipo_agenda_text = 'C';//CONSULTA
                break;
            case '2':
                tipo_agenda_text = 'D';//DENTAL
                break;
            case '3':
                tipo_agenda_text = 'T';//TELEMEDICINA
                break;
            case '4':
                tipo_agenda_text = 'E';//EXAMEN
                break;
        }

        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                fecha_consulta: fecha_consulta,
                reserva_hora_id: reserva_hora_id,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_asistente: id_asistente,
                origen: origen,
                tipo_hora_medica: tipo_agenda_text,
            }
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {

                data = JSON.parse(data);
                console.log(data);
                if(data.estado == 'error')
                {
                    swal({
                        title: "Error!",
                        text: data.msj,
                        icon: "error",
                        type: "error",
                        buttons: "Cerrar",
                    });
                }
                else
                {
                    swal({
                        title: "Hora Agendada Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                    // ponemos la fecha y hora de la proxima atencion
                    $('#proxima_fecha_atencion').html(data.fecha_consulta);
                    $('#proxima_hora_atencion_inicio').html(data.hora_inicio);
                    $('#proxima_hora_atencion_fin').html(data.hora_termino);
                    guardar_plan_tratamiento_psico();
                    $('#hora_agendada').val(1);
                    let esUltimaSesion = false;
                    if($('#finalizando_sesiones').val() == 1){
                        esUltimaSesion = true;
                    }
                    console.log(esUltimaSesion);
                }
                $('#agenda_agregar_paciente').modal('hide');

                    $('#reserva_hora_id_profesional').val('');
                    $('#reserva_hora_id_lugar_atencion').val('');
                    $('#reserva_hora_fecha_consulta').val('');
                    $('#reserva_hora_hora_consulta').val('');
                    $('#reserva_hora_id_paciente').val('');
                    $('#reserva_rut_paciente').html('');
                    $('#reserva_hora_nombre').html('');
                    $('#reserva_fecha_nacimiento').html('');
                    $('#reserva_sexo').text('');
                    $('#reserva_convenio').html('');
                    $('#reserva_direccion').html('');
                    $('#reserva_hora_email').html('');
                    $('#reserva_hora_telefono').html('');


            } else {

                swal({
                    title: "Error!",
                    text: "Problema en la solicitud de la hora",
                    icon: "error",
                    type: "error",
                    buttons: "Cerrar",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function dame_plan_tratamiento(id_ficha_atencion){
        let url = "{{ route('profesional.dame_plan_tratamiento') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: $('#id_profesional_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                hora_agendada : $('#hora_agendada').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                var numero_sesion;
                var consulta = '';
                if(data.registro.sesion_actual == null || data.registro.sesion_actual == 0){
                    numero_sesion = 0 + ' de ' + data.registro.numero_sesiones + ' (No se ha iniciado tratamiento)';
                }else if(data.registro.sesion_actual == data.registro.numero_sesiones){
                    numero_sesion = 'Estamos finalizando el tratamiento con un total de ' + data.registro.numero_sesiones + ' sesiones';
                    consulta = '¿Desea continuar con mas sesiones? Presione <a href="javascript:void(0)" onclick="agregar_sesiones()"> aquí </a>';
                    $('#finalizando_sesiones').val(1);
                    $('#contenedor_agendar_hora').addClass('d-none', true);
                }
                else{
                    $('#contenedor_agendar_hora').removeClass('d-none', true);
                    $('#contenedor_agendar_hora').css('display','block');
                    numero_sesion = 'Vamos en la sesión '+parseInt(data.registro.sesion_actual) + ' de ' + data.registro.numero_sesiones + ' sesiones';
                }
                $('#id_plan').val(data.registro.id);
                $('#numero_sesion').html(numero_sesion);
                $('#consulta').html(consulta);
                $('#num_sesion_obesidad').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_diabetes').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_hipertension').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_dislipidemia').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_irenal').val(parseInt(data.registro.sesion_actual));
                $('#num_sesion_hiperuric').val(parseInt(data.registro.sesion_actual));
                $('#diagnostico_tratamiento').val(data.registro.diagnostico);
                $('#hipotesis').val(data.registro.diagnostico);
                $('#tratamiento_seguir').val(data.registro.tratamiento);
                $('#numero_sesiones').val(data.registro.numero_sesiones);
                $('#objetivos').val(data.registro.objetivos);
            } else {
                var numero_sesion = ' (No se ha iniciado tratamiento)';

                $('#numero_sesion').html(numero_sesion);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function guardar_plan_tratamiento_psico() {
        const diagnostico = $('#diagnostico_tratamiento').val().trim();
        const tratamiento = $('#tratamiento_seguir').val().trim();
        const sesiones = $('#numero_sesiones').val().trim();
        const objetivos = $('#objetivos').val().trim();
        const id_ficha_atencion = $('#id_fc').val();
        const tipo_sesiones = $('#tipo_sesiones').val();

        // Validación simple
        if (!diagnostico || !sesiones || !objetivos) {
            swal({
                title: 'Error',
                text: 'Todos los campos obligatorios deben estar completos',
                icon: 'error'
            });
            return;
        }

        const data = {
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            numero_sesiones: sesiones,
            objetivos: objetivos,
            id_ficha_atencion: id_ficha_atencion,
            tipo_sesiones: tipo_sesiones,
            _token: CSRF_TOKEN // Asegúrate de definir CSRF_TOKEN en tu vista
        };

        console.log(data);

        $.ajax({
            url: '{{ route("profesional.guardar_planificacion_nutri") }}', // Ajusta si tu ruta es diferente
            method: 'POST',
            data: data,
            success: function(response) {
                console.log(response);

                swal({
                    title: 'Éxito',
                    text: 'Planificación psicológica guardada correctamente',
                    icon: 'success'
                }).then(() => {
                    $('#plan_nutri').modal('hide');
                    $('#form_plan_nutri')[0].reset(); // limpia el formulario
                    // Aquí podrías recargar alguna parte de la vista si necesitas
                });
            },
            error: function(xhr) {
                let mensaje = 'Ocurrió un error al guardar la planificación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }

    function guardar_evaluacion_sico() {
        let datos_sico = {};

        $('#atencion_sicosocial').find('input, select, textarea').each(function() {
            let name = $(this).attr('name');
            if (!name) return;

            if ($(this).is(':checkbox')) {
                datos_sico[name] = $(this).is(':checked') ? 1 : 0;
            } else if ($(this).is(':radio')) {
                if ($(this).is(':checked')) {
                    datos_sico[name] = $(this).val();
                }
            } else {
                datos_sico[name] = $(this).val();
            }
        });

        // Agrega los identificadores adicionales
        const payload = {
            id_ficha_atencion: $('#id_fc').val(),
            id_paciente: $('#id_paciente').val(),
            id_profesional: $('#id_profesional_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            datos_nutri: datos_sico,
            archivos_adjuntos: archivosSubidos,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        console.log(datos_sico);

        $.ajax({
            url: '{{ route("profesional.guardar_evaluacion_nutricional") }}', // Asegúrate que la ruta exista
            method: 'POST',
            data: payload,
            success: function(response) {
                console.log(response);
                swal({
                    title: 'Éxito',
                    text: response.detalle || 'Evaluación psicológica guardada correctamente.',
                    icon: 'success'
                });
                dame_atencion_sico();
            },
            error: function(xhr) {
                let mensaje = 'Error al guardar la evaluación.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                swal({
                    title: 'Error',
                    text: mensaje,
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        });
    }

    function dame_atencion_sico(){
        let id_ficha_atencion = $('#id_fc').val();
        let url = "{{ route('profesional.dame_evaluacion_nutricional') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: $('#id_profesional_fc').val(),
                id_paciente: $('#id_paciente_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                let registros = data.registro;
                // Elimina hermanos anteriores (por si los hay)
                $('#contenedor_hermanos').html('');

                // Verifica cuántos hermanos vienen en los datos
                let hermanos = [];
                for (let key in registros) {
                    if (key.startsWith('psi_hf_nombre_hno_')) {
                        hermanos.push(key);
                    }
                }

                // Ordena por número para agregarlos en orden correcto
                hermanos.sort((a, b) => {
                    const numA = parseInt(a.replace('psi_hf_nombre_hno_', ''));
                    const numB = parseInt(b.replace('psi_hf_nombre_hno_', ''));
                    return numA - numB;
                });

                // Crea los campos necesarios antes de rellenar datos
                hermanos.forEach(() => agregarHermanos());

                // Recorremos todas las propiedades del objeto
                for (let key in registros) {
                    if (registros.hasOwnProperty(key)) {
                        // Ignorar claves vacías o inválidas para selectores jQuery
                        if (!key || key.trim() === '#' || /[^a-zA-Z0-9_-]/.test(key)) {
                            continue;
                        }

                        let $element = $('#' + key);
                        if ($element.length > 0) {
                            let value = registros[key];
                            $element.val(value !== null ? value : '');
                        }
                    }
                }
                evaluar_hermanos();
                console.log(data.imagenes);
                if (data.imagenes && Array.isArray(data.imagenes)) {
                    const contenedor = $('#listado_imagenes_psico_pc');
                    contenedor.empty(); // Limpia el contenedor por si ya tenía imágenes

                    data.imagenes.forEach(function(url) {
                        const html = `
                            <div class="mb-2 position-relative" style="display:inline-block;">
                                <img src="${url}" alt="Archivo adjunto" onclick="amplificar_imagen_psicologia('${url}')" class="img-thumbnail" style="max-width: 150px; height: auto;">
                                <button type="button" class="btn btn-sm btn-danger eliminar-imagen" data-url="${url}" style="position: absolute; top: 5px; right: 5px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        `;
                        contenedor.append(html);
                    });


                    // Evento para eliminar imagen
                    contenedor.on('click', '.eliminar-imagen', function () {
                        const boton = $(this);
                        const ruta = boton.data('url');

                        swal({
                            title: "¿Eliminar archivo?",
                            text: "Esta acción no se puede deshacer.",
                            icon: "warning",
                            buttons: ["Cancelar", "Sí, eliminar"],
                            dangerMode: true,
                        }).then((confirmado) => {
                            if (confirmado) {
                                $.ajax({
                                    url: '{{ route("paciente.archivo.eliminar") }}',
                                    type: 'POST',
                                    data: {
                                        ruta: ruta,
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(res) {
                                        boton.closest('div').remove();
                                        swal("Eliminado", res.mensaje, "success");
                                        dame_atencion_sico();
                                    },
                                    error: function(err) {
                                        console.error(err);
                                        swal("Error", "No se pudo eliminar el archivo", "error");
                                    }
                                });
                            }
                        });
                    });
                }
            } else {
                // swal({
                //     title: "Error!",
                //     text: data.detalle,
                //     icon: "error",
                //     // buttons: "Aceptar",
                //     //SuccessMode: true,
                // });
                console.log('error');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function dame_historial_controles(){
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let data = {
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_ficha_atencion: id_ficha_atencion,
            id_profesional: id_profesional,
            _token: CSRF_TOKEN
        }

        console.log(data);
        let url = "{{ route('profesional.dame_historial_controles_nutricionales') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje === 'ok') {
                if (data.mensaje === 'ok') {
                    const planes = data.planes;
                    const controlesAgrupados = data.controles_agrupados;

                    const tablaPlanes = $('#tabla_planes tbody');
                    tablaPlanes.empty();

                    planes.forEach(plan => {
                        const estado = plan.estado == 1 ? 'Activo' : 'Finalizado';

                        tablaPlanes.append(`
                            <tr>
                                <td>${plan.id}</td>
                                <td>${plan.fecha}</td>
                                <td>${plan.numero_sesiones}</td>
                                <td>${estado}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary ver-controles" data-plan="${plan.id}">
                                        Ver controles
                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    // Evento al hacer clic en "Ver controles"
                    $('#tabla_planes').on('click', '.ver-controles', function () {
                        const planId = $(this).data('plan');
                        const controles = controlesAgrupados[planId];

                        const tablaControles = $('#tabla_controles tbody');
                        tablaControles.empty();

                        if (!controles || controles.length === 0) {
                            tablaControles.append('<tr><td colspan="5">Sin controles registrados para este plan.</td></tr>');
                            return;
                        }
                        console.log(controles);
                        controles.forEach(ctrl => {
                             // Convertir la fecha a objeto Date solo si existe
                            let fechaFormateada = '-';
                            if (ctrl.fecha) {
                                // Crear un objeto Date
                                const fecha = new Date(ctrl.fecha);
                                // Formatear a YYYY-MM-DD o a un formato legible sin la hora
                                // Por ejemplo:
                                fechaFormateada = fecha.toISOString().split('T')[0];
                                // Esto deja solo la parte antes de la T, ej: "2025-07-01"

                                // Alternativamente, para formato local más legible:
                                // fechaFormateada = fecha.toLocaleDateString();
                                // que puede mostrar algo como "7/1/2025" según configuración local
                            }
                            tablaControles.append(`
                                <tr>
                                    <td>${fechaFormateada ?? '-'}</td>
                                    <td>${ctrl.num_sesion_obesidad ?? '-'}</td>
                                    <td>${ctrl.trabajo_en_obesidad ?? '-'}</td>
                                    <td>${ctrl.objetivo_logrado == 1 ? '✔️' : '❌'}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-info ver-detalle-control"
                                            data-id-ficha="${ctrl.id_ficha_atencion}">
                                            Ver detalle
                                        </button>
                                    </td>
                                </tr>
                            `);
                        });


                    });
                }

            } else {
                swal({
                    title: "Sin registros",
                    text: data.detalle ?? 'No se encontraron controles.',
                    icon: "warning",
                    button: "Aceptar",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
            // swal({
            //     title: "Error!",
            //     text: "No se pudo cargar el historial de controles nutricionales.",
            //     icon: "error",
            //     // buttons: "Aceptar",
            //     //SuccessMode: true,
            // });
        });

    }

    function dame_control(id_ficha_atencion = null){
        let historial = true;
        if(id_ficha_atencion == null){
            id_ficha_atencion = $('#id_fc').val();
            historial = false;
        }
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let url = "{{ route('profesional.dame_control_nutricional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.mensaje == 'ok') {
                let registros = data.registro.datos_control;
                console.log(registros);
                if(!historial){
                    // Recorremos todas las propiedades del objeto
                    for (let key in registros) {
                        if (registros.hasOwnProperty(key)) {
                            // Buscamos un input, select o textarea que tenga el mismo ID
                            let $element = $('#' + key);

                            if ($element.length > 0) {
                                let value = registros[key];

                                // Establecemos el valor (null lo convertimos en vacío)
                                $element.val(value !== null ? value : '');
                            }
                        }
                    }
                }else{
                    // Abrimos modal
                    $('#modalControlPsicologica').modal('show');

                    let html = '';

                    for (let key in registros) {
                        if (registros.hasOwnProperty(key)) {
                            let valor = registros[key];

                        // 👉 Omitir si la clave empieza con "num_sesion"
                        if (key.startsWith('num_sesion')) {
                            continue;
                        }

                        if (key === 'objetivo_logrado') {
                            let label = 'Objetivo Logrado';
                            let icono = (valor == '1') 
                                ? '<span class="text-success"><i class="fas fa-check-circle"></i> Sí</span>' 
                                : '<span class="text-danger"><i class="fas fa-times-circle"></i> No</span>';

                            html += `
                                <div class="mb-2">
                                    <strong>${label}:</strong> ${icono}
                                </div>
                            `;
                            continue; // evita que se duplique más abajo
                        }


                            // Filtrar nulls, vacíos y "0"
                            if (valor !== null && valor !== '' && valor !== '0') {
                                // Opcional: formatear claves para mostrar como texto legible
                                let label = key.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());

                                html += `
                                    <div class="mb-2">
                                        <strong>${label}:</strong> ${valor}
                                    </div>
                                `;
                            }
                        }
                    }

                    if (html === '') {
                        html = '<p class="text-muted">No hay información relevante para mostrar.</p>';
                    }

                    

                    $('#contenido_control_nutricional_historial').html(html);
                }


            } else {
                console.log('No se pudo cargar el control nutricional.');
                $('#num_sesion_obesidad').val(data.num_sesion);
                $('#num_sesion_diabetes').val(data.num_sesion);
                $('#num_sesion_hipertension').val(data.num_sesion);
                $('#num_sesion_dislipidemia').val(data.num_sesion);
                $('#num_sesion_irenal').val(data.num_sesion);
                $('#num_sesion_hiperuric').val(data.num_sesion);
            }
        })

        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
            console.log('Error al cargar el control nutricional.');
        });

    }
</script>
<script>
    $('#agregar_sesiones').on('hidden.bs.modal', function () {
        $('#indicar_terapia').modal('show');
    });

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

        $('#form_ficha_nutri').on('submit', function(e) {
            const hora = $('#hora_agendada').val();
            const hipotesis = $('#hipotesis').val().trim(); // <- elimina espacios

            // Validar hipótesis primero
            if (!hipotesis) {
                e.preventDefault(); // Detiene el envío
                swal({
                    title: 'Campo obligatorio',
                    text: 'Debe ingresar una hipótesis antes de guardar.',
                    icon: 'error',
                    buttons: 'Aceptar',
                });
                return; // No seguir con otras validaciones
            }

            if (hora === '0') {
                e.preventDefault(); // Detiene el envío temporalmente

                swal({
                    title: '¿Está seguro?',
                    text: "No ha agendado el próximo control. ¿Desea continuar?",
                    icon: 'warning',
                    buttons: ["Cancelar", "Continuar cerrando"],
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        // Envía el formulario manualmente si el usuario confirma
                        $('#form_ficha_nutri')[0].submit();
                    }
                });
            }
            // Si hora no es 1, el formulario se envía directamente
        });

        $('#tabla_controles').on('click', '.ver-detalle-control', function () {
            const idFicha = $(this).data('id-ficha');

            if (idFicha) {
                dame_control(idFicha); // llama tu función existente
            }
        });
    });

    function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

        // let actual = $('#'+input);
        // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

        // equivalente.val(actual.val());

    }

        function agregar_medicamentos_ficha() {


        var rows1 = [];
        $('#tabla_medicamento_cirugia tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                rows1.push(rol);
            }
        });

        $('#medicamentos').val(JSON.stringify(rows1));


    }

    function agregar_examenes_ficha() {
        var rows = [];
        $('#tabla_examen_cirugia tr').each(function(i, n) {
            if (i > 0) {
                console.log(i);
                rol = {};
                var data = $(this).find("td");
                rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                rows.push(rol);
            }
        });
        $('#examenes').val(JSON.stringify(rows));
    }

    function internutri() {
        $('#modal_interconsulta').modal('show');
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

        function agregar_sesiones(){
        $('#indicar_terapia').modal('hide');
        $('#agregar_sesiones').modal('show');
    }

    function confirmar_agregar_sesiones() {
        let cantidad = parseInt($('#input_sesiones_adicionales').val());

        if (isNaN(cantidad) || cantidad <= 0) {
            $('#error_sesion_alert').removeClass('d-none');
            return;
        }

        $('#error_sesion_alert').addClass('d-none');
        $('#agregar_sesiones').modal('hide');

        // Obtener variables desde los inputs ocultos
        let id_profesional = $('#id_profesional_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_plan = $('#id_plan').val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        let url = "{{ route('profesional.continuar_sesiones_nutricion') }}";

        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token: _token,
                id_plan: id_plan,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                id_ficha_atencion: id_ficha_atencion,
                nuevas_sesiones: cantidad
            },
            success: function(response) {
                console.log('Sesiones agregadas correctamente:', response);
                swal({
                    title: "Sesiones actualizadas",
                    text: "Se han agregado " + cantidad + " sesiones al tratamiento.",
                    icon: "success",
                    buttons: "Aceptar"
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al agregar sesiones:', error);
                swal({
                    title: "Error",
                    text: "Ocurrió un problema al intentar agregar sesiones.",
                    icon: "error",
                    buttons: "Cerrar"
                });
            }
        });
    }
</script>



<script>
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



