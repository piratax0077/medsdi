<div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
    <div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h6 class="f-20 text-c-blue mb-2">Vacunas</h6>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card-a">
                <div class="card-header-a" id="motivop">
                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivop_c" aria-expanded="false" aria-controls="motivop_c">
                        Estado de vacunación del menor
                    </button>
                </div>
                <div id="motivop_c" class="collapse show" aria-labelledby="motivop" data-parent="#motivop">
                    <div class="card-body-aten-a">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Estado de vacunación</label>
                                <select class="form-control form-control-sm" id="categoria">
                                    <option>Seleccione</option>
                                    <optgroup label="Programa Minsal">
                                        <option value="AL">Al día</option>
                                        <option value="LA">Atrasado</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Vacuna correspondiente a edad</label>
                                <select class="form-control form-control-sm" id="categoria">
                                    <option>Seleccione</option>
                                    <optgroup label="Recién Nacido">
                                        <option value="AL">BCG</option>
                                        <option value="LA">Hepatitis B</option>
                                    </optgroup>
                                    <optgroup label="2° mes , 4° mes , 6° mes">
                                        <option value="AL">Hexavalente</option>
                                        <option value="LA">Neumocócica Conjugada (prematuros)</option>
                                    </optgroup>
                                    <optgroup label="12 meses">
                                        <option value="AL">Tres Vírica 1ª Dosis</option>
                                        <option value="LA">Meningocócica Conjugada</option>
                                        <option value="LA">Neumocócica Conjugada</option>
                                    </optgroup>
                                    <optgroup label="18 meses">
                                        <option value="AL">Hexavalente</option>
                                        <option value="LA">Hepatitis A</option>
                                        <option value="LA">Varícela 1ª Dosis</option>
                                        <option value="LA">Fiebre Amarilla(Isla de Pascua)</option>
                                    </optgroup>
                                    <optgroup label="Pre-escolar">
                                        <option value="AL">Tres Vírica 2ª Dosis</option>
                                        <option value="LA">Varícela 2ª Dosis</option>
                                    </optgroup>
                                    <optgroup label="Escolar">
                                        <option value="AL">1º Básico dTp (acelular)</option>
                                        <option value="AL">4º Básico VPH 1ª Dosis</option>
                                        <option value="AL">5º Básico VPH 2ª Dosis</option>
                                        <option value="AL">8º Básico dTp (acelular)</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Incidentes con la vacuna</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="incidentes" id="incidentes"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="button" class="btn btn-primary-light-c btn-sm btn-block"><i class="feather icon-plus"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body task-attachment">
                        <div class="form-row" id="formulario_vac">
                            <div class="col-sm-12 col-md-12">
                                <div class="btn-group btn-block btn-sm" role="group">
                                    <button type="button" class="btn btn-primary-light-c btn-block btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="feather icon-file-text"></i> Indicaciones
                                    </button>
                                    <div class="dropdown-menu position-absolute" style="z-index: 2000;">
                                      <a class="dropdown-item" onclick="i_vacunas();"><i class="feather icon-plus"></i> Indicar Vacunas Programa MINSAL</a>
                                      <a class="dropdown-item" onclick="i_vacunas_otras();"><i class="feather icon-plus"></i> Indicar Otras Vacunas</a>
                                      <a class="dropdown-item" onclick="carnet_vac();"><i class="feather icon-plus"></i> Carnet de vacunas generales</a>
                                      <a class="dropdown-item" onclick="inter();"><i class="feather icon-plus"></i> Interconsulta</a>
                                      <a class="dropdown-item" onclick="otras_vac();"><i class="feather icon-plus"></i> Carnet de vacunas especiales</a>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-sm-12 col-md-12">
                                <ul class="media-list px-2">
                                    <li class="media d-flex m-b-15">
                                        <div class="m-r-20 file-attach">
                                            <i class="far fa-file f-16 text-muted"></i>
                                        </div>
                                        <div class="media-body">
                                            <a href="#!" class="m-b-5 d-block text-secondary">Overdrew_scowled.doc</a>
                                        </div>
                                        <div class="float-right text-muted">
                                            <i class="fas fa-download f-10"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card-a">
                    <div class="card-header-a">
                        <div class="row">
                            <div class="col-md-12 d-inline">
                                <h6 class="text-c-blue d-inline">Estado de Vacunación</h6>
                                <button type="button" class="btn btn-primary-light-c btn-xs d-inline my-1 mr-3"><i class="feather icon-printer"></i> Imprimir</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-aten-a">
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="table-responsive">
                                    <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%"><!--AGREGAR EL ID DE LA TABLA PARA QUE FUNCIONE RESPOMSIVO-->
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">EDAD</th>
                                                <th class="text-center align-middle">VACUNAS</th>
                                                <th class="text-center align-middle">RECIBIDA</th>
                                                <th class="text-center align-middle">FECHA</th>
                                                <th class="text-center align-middle">INCIDENTES</th>
                                                <th class="text-center align-middle">ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span><strong>RN</strong></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>BCG</span><br>
                                                    <span>Hepatitis B</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                   <span>SI</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>20/12/2021</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>ERITEMA LOCAL</span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <button type="button" class="btn btn-outline-info btn-sm">
                                                    <i class="feather feather icon-check"></i> Indicar</button><!--SI LA OPCION RECIBIDA ES NO DEBE APARECER BOTON-->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            
                            </div>
                            <!--<div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-success">Imprimir</button>
                                </div>
                            </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>


