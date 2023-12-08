<div id="mamas_ant_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mamas_ant_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes mamas 12345</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_3" class="text-primary" style="cursor: pointer;" onclick="abrir_div('formulario_3');">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_3" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="fecha">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="tipo_examen">Tipo de examen</label>
                                    <input type="text" class="form-control form-control-sm" name="tipo_examen" id="tipo_examen">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="resultado">Resultado</label>
                                    <input type="text" class="form-control form-control-sm" name="resultado" id="resultado">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="indic">Indicaciones</label>
                                    <input type="text" class="form-control form-control-sm" name="indic" id="indic">
                                </div>
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm" for="tto_complicaciones">Tratamientos o complicaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="tto_complicaciones" id="tto_complicaciones"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="hemorragias_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Tipo de Examen</th>
                                        <th class="text-center align-middle">Resultado</th>
                                        <th class="text-center align-middle">Indicaciones</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones - otros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">Mamografía</td>
                                        <td class="text-center align-middle">Normal</td>
                                        <td class="text-center align-middle">Control Anual
                                        </td>
                                        <td class="text-center align-middle">No</td>
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
    function mamas_antecedentes() {
        $('#mamas_ant_modal').modal('show');
    }
</script>
