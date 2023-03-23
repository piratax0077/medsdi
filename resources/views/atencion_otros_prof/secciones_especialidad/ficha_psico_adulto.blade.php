<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
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
                <div class="tab-content" id="ficha-ad-psico">
                    <!--ATENCIÓN  DIAGNOSTICA-->
                    <div class="tab-pane fade show active" id="atencion-diagnostica" role="tabpanel" aria-labelledby="atencion-diagnostica">
                        <div class="row bg-white shadow-sm rounded mx-1">
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
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="ant-generales">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ant-generales-c" aria-expanded="false" aria-controls="ant-generales-c">
                                                  Antecedentes generales
                                                </button>
                                            </div>
                                            <div id="ant-generales-c" class="collapse" aria-labelledby="ant-generales" data-parent="#ant-generales">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Nombre completo</label>
                                                                <input type="text" class="form-control form-control-sm" name="nombre_completo" id="nombre_completo">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3 col-md-3 col-lg-3 col-xl-3">
                                                                <label class="floating-label">Sexo</label>
                                                                <select class="form-control form-control-sm" name="sexo" id="sexo">
                                                                    <option>Seleccione</option>
                                                                    <option>Masculino</option>
                                                                    <option>Femenino</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3 col-md-3 col-lg-3 col-xl-3">
                                                                <label class="floating-label">Rut</label>
                                                                <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Fecha de nacimiento</label>
                                                                <input type="date" class="form-control form-control-sm" name="nacimiento" id="nacimiento">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Edad</label>
                                                                <input type="text" class="form-control form-control-sm" name="nacimiento" id="nacimiento">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Lugar de nacimiento</label>
                                                                <input type="text" class="form-control form-control-sm" name="lugar_nacimiento" id="lugar_nacimiento">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Estado civil</label>
                                                                <select class="form-control form-control-sm" name="estado_civil" id="estado_civil">
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
                                                                <select class="form-control form-control-sm" name="niv_ed" id="niv_ed">
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
                                                                <label class="floating-label-activo-sm">Ocupación</label>
                                                                <input type="text" class="form-control form-control-sm" name="ocupacion" id="ocupacion">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Religión</label>
                                                                <input type="text" class="form-control form-control-sm" name="religion" id="religion">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <label class="floating-label-activo-sm">Dirección</label>
                                                                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Región</label>
                                                                <select class="form-control form-control-sm" name="region" id="region">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Comuna</label>
                                                                <select class="form-control form-control-sm" name="comuna" id="comuna">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                                <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Motivo de consulta</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=10" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Fuente de remisión</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="remision" id="remision"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="observaciones" id="observaciones"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--RESIDENCIA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="residencia">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#residencia-c" aria-expanded="false" aria-controls="residencia-c">
                                                  Residencia
                                                </button>
                                            </div>
                                            <div id="residencia-c" class="collapse" aria-labelledby="residencia" data-parent="#residencia">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                           <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Vive con</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="vive_con" id="vive_con"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=8" onblur="this.rows=1;"name="vive_obs" id="vive_obs"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--HISTORIA FAMILIAR-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="hist-familiar">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#hist-familiar-c" aria-expanded="false" aria-controls="hist-familiar-c">
                                                  Historia familiar / personas significativas 
                                                </button>
                                            </div>
                                            <div id="hist-familiar-c" class="collapse" aria-labelledby="hist-familiar" data-parent="#hist-familiar">
                                                <div class="card-body-aten shadow-none">
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
                                    </div>
                                    <!--ANTECEDENTES-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="antecedentes">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                  Hábitos psicobiológicos
                                                </button>
                                            </div>
                                            <div id="antecedentes-c" class="collapse" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                <div class="card-body-aten shadow-none">
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
                                    </div>
                                    <!--ANTECEDENTES MÉDICOS, PSIQUIATRICOS, PSICOLÓGICOS-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="a-med">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#a-med-c" aria-expanded="false" aria-controls="a-med-c">
                                                  Antecedentes médicos, psiquiatricos, psicológicos
                                                </button>
                                            </div>
                                            <div id="a-med-c" class="collapse" aria-labelledby="a-med" data-parent="#a-med">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Antecedentes médicos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_medicos" id="ant_medicos"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Ant. de suicidio (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_enf_mentales" id="ant_enf_mentales"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Ant. de enfermedades mentales (paciente o familiares)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="ant_suicidio" id="ant_suicidio"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Tratamientos psicologicos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psicologicos_prev" id="trat_psicologicos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Tratamientos psiquiátricos previos</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="trat_psiquiatricos_prev" id="trat_psiquiatricos_prev"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="floating-label-activo-sm">Medicación (actual)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"name="medicacion_actual" id="medicacion_actual"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--BIOPATOGRAFÍA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="biopato">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#biopato-c" aria-expanded="false" aria-controls="biopato-c">
                                                  Biopatografía
                                                </button>
                                            </div>
                                            <div id="biopato-c" class="collapse" aria-labelledby="biopato" data-parent="#biopato">
                                                <div class="card-body-aten shadow-none">
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
                                        <div class="card">
                                            <div class="card-header" id="laboral">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#laboral-c" aria-expanded="false" aria-controls="laboral-c">
                                                  Antecedentes laborales
                                                </button>
                                            </div>
                                            <div id="laboral-c" class="collapse" aria-labelledby="laboral" data-parent="#laboral">
                                                <div class="card-body-aten shadow-none">
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
                                        <div class="card">
                                            <div class="card-header" id="exmental">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exmental-c" aria-expanded="false" aria-controls="exmental-c">
                                                  Exámen mental
                                                </button>
                                            </div>
                                            <div id="exmental-c" class="collapse" aria-labelledby="exmental" data-parent="#exmental">
                                                <div class="card-body-aten shadow-none">
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
                                    </div>
                                    <!--PLAN DE TRABAJO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="plan-trabajo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-trabajo-c" aria-expanded="false" aria-controls="plan-trabajo-c">
                                                  Plan de trabajo
                                                </button>
                                            </div>
                                            <div id="plan-trabajo-c" class="collapse" aria-labelledby="plan-trabajo" data-parent="#plan-trabajo">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <label class="floating-label-activo-sm">Plan de trabajo</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="p_trabajo" id="p_trabajo"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header" id="diagnostico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                  Diagnóstico 
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten shadow-none">
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
                    <!--EVOLUCION-->
                    <div class="tab-pane fade" id="evolucion" role="tabpanel" aria-labelledby="evolucion">
                        <div class="row bg-white shadow-none rounded mx-1">
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
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta-ev">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-ev-c" aria-expanded="false" aria-controls="mot-consulta-ev-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-ev-c" class="collapse" aria-labelledby="mot-consulta-ev" data-parent="#mot-consulta-ev">
                                                <div class="card-body-aten shadow-none">
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
                                        <div class="card">
                                            <div class="card-header" id="eval-actual">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#eval-actual-c" aria-expanded="false" aria-controls="eval-actual-c">
                                                  Evaluación actual
                                                </button>
                                            </div>
                                            <div id="eval-actual-c" class="collapse" aria-labelledby="eval-actual" data-parent="#eval-actual">
                                                <div class="card-body-aten shadow-none">
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
                                        <div class="card">
                                            <div class="card-header" id="plan">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#plan-c" aria-expanded="false" aria-controls="plan-c">
                                                  Plan propuesto
                                                </button>
                                            </div>
                                            <div id="plan-c" class="collapse" aria-labelledby="plan" data-parent="#plan">
                                                <div class="card-body-aten shadow-none">
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
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Resultados
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten shadow-none">
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
        
        
       


 