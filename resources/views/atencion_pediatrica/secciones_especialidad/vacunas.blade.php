<div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
    <div class="row bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-3 mb-2">
                    <h6 class="f-18 d-inline float-left">Vacunas</h6>
                </div>
            </div>
        </div>
        <hr class="mt-1">
        <div class="col-sm-12">
            <div class="row">
                <div class="card">
                    <div class="card-body shadow-none" id="formulario_vac">
                        <form>
                            <div class="form-row mb-2">
                                <div class="col-md-12">
                                    <h6>Información del estado de Vacunación del menor</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Estado de vacunación</label>
                                    <select class="form-control form-control-sm" id="categoria">
                                        <option>Seleccione</option>
                                        <optgroup label="Programa Minsal">
                                            <option value="AL">Al día</option>
                                            <option value="LA">Atrasado</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                        <label class="floating-label">Vacuna correspondiente a edad</label>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Vacuna administrada-->
            <!--Incidentes con la vacuna-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info align-middle">
                        <h6 class="float-left d-inline">Incidentes con la vacuna</h6>
                    </div>
                    <div class="card-body shadow-none">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="floating-label">Incidentes</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="incidentes" id="incidentes"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-12 mt-3 mb-0">
                    <h6 class="f-16 text-c-blue">Estado de Vacunación</h6>
                    <hr>
                </div>
            </div>
            <div class="row mb-3">
                <!--Motivo de consulta-->
                <div class="col-sm-12">
                    <div class="card">
                        <table id="tabla_profesionales_laboratorio" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
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

                                        <button type="button" class="btn btn-danger btn-sm">
                                        <i class="feather icon-x-circle"></i> INDICAR</button><!--SI LA OPCION RECIBIDA ES NO DEBE APARECER BOTON-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Medicamentos o Examen-->
                <div class="form-group col-md-6">
                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas();"><i class="fa fa-plus"></i> Indicar Vacunas Programa MINSAL</button>
                </div>
                <div class="form-group col-md-6">
                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas_otras();"><i class="fa fa-plus"></i> Indicar Otras Vacunas</button>
                </div>
                <div class="col-sm-12">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="carnet_vac();"><i class="fa fa-plus"></i> Carnet de vacunas generales</button>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="inter();"><i class="fa fa-plus"></i> Interconsulta</button>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="otras_vac();"><i class="fa fa-plus"></i> Carnet de vacunas especiales</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-info">Guardar</button>
                    <button type="button" class="btn btn-success">Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>
