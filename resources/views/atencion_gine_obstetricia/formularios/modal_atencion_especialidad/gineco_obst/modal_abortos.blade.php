<div id="abortos_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="abortos_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes Abortos</h5>
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
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="fecha_abort">Fecha Aborto</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_abort" id="fecha_abort">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="num_emb">N° de embarazo</label>
                                <input type="text" class="form-control form-control-sm" name="num_emb" id="num_emb">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="causa">Causa</label>
                                <input type="text" class="form-control form-control-sm" name="causa" id="causa">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="tipo_aborto">Tipo de Aborto</label>
                                <input type="text" class="form-control form-control-sm" name="tipo_aborto" id="tipo_aborto">
                            </div>
                                <div class="form-group ol-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm" for="obs_tto_complic">Tratamientos o complicaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tto_complic" id="obs_tto_complic"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                                        <th class="text-center align-middle">N° de Aborto</th>
                                        <th class="text-center align-middle">Causa</th>
                                        <th class="text-center align-middle">Tipo de Aborto</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">violación</td>
                                        <td class="text-center align-middle">Profesional</td>
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
<script>
    function Abortos_ant() {
        $('#abortos_modal').modal('show');
    }
</script>
