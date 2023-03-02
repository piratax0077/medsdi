<div id="embarazos_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="embarazos_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes embarazo y puerperio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_6" onclick="abrir_div('formulario_6');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_6" style="display:none;">
                    <form>
                        <div class="col-md-12">
                            <div class="form-row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">N° de embarazo</label>
                                <input type="text" class="form-control form-control-sm" name="num_emb" id="num_emb">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Control</label>
                                <input type="text" class="form-control form-control-sm" name="control_emb" id="control_emb">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Tipo de parto</label>
                                <input type="text" class="form-control form-control-sm" name="tipo_parto" id="tipo_parto">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Puerperio</label>
                                <input type="text" class="form-control form-control-sm" name="puerperio" id="puerperio">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Recién nacido</label>
                                <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="recien_nacido" id="recien_nacido"></textarea>
                            </div>
                                <div class="form-group ol-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm">Tratamientos o complicaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otros_ant" id="otros_ant"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table id="Embarazos" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">N° de Embarazo</th>
                                        <th class="text-center align-middle">Control</th>
                                        <th class="text-center align-middle">Tipo de Parto</th>
                                        <th class="text-center align-middle">Puerperio</th>
                                        <th class="text-center align-middle">R-N</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">Controlado</td>
                                        <td class="text-center align-middle">Vaginal</td>
                                        <td class="text-center align-middle">Normal</td>
                                        <td class="text-center align-middle">Sano <br>3000 gr</td>
                                        <td class="text-center align-middle">ninguno</td>
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
