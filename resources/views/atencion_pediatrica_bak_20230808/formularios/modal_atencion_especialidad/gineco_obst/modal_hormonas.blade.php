<div id="hormona_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hormona_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes hormonales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_3" class="text-primary" style="cursor: pointer;" onclick="abrir_div('formulario_3');">Añadir antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_3" style="display:none;">
                    <div class="col-sm-12 col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Motivo del examen</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione</option>
                                        <option>Sospecha de transtorno hormonal</option>
                                        <option>Infertilidad</option>
                                        <option>Menopausia</option>
                                        <option>Alteración del Ciclo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tipo de examen</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione</option>
                                        <option>Perfíl hormonal femenino</option>
                                        <option>FSH</option>
                                        <option>LH</option>
                                        <option>Estradiol</option>
                                        <option>Prolactina</option>
                                        <option>Progesterona</option>
                                        <option>Testosterona</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Resultado</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="resultado" id="resultado"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tratamientos o comentarios</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="otros_ant" id="otros_ant"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="table-responsive">
                            <table id="fracturas_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Motivo</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        <th class="text-center align-middle">Resultados</th>
                                        <th class="text-center align-middle">Tratamientos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">Alteración del Ciclo</td>
                                        <td class="text-center align-middle">Perfíl Hormonal Femenino</td>
                                        <td class="text-center align-middle">Alteración de los niveles de Estradiol</td>
                                        <td class="text-center align-middle">Estrogenos</td>

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
