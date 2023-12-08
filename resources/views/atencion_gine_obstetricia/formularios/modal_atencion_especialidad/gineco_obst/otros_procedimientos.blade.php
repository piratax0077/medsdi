<div id="otros_proc_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otros_proc_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_ciclo"> Otros Procedimientos Gineco-Obstetricia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_4" onclick="abrir_div('ot_proc_g_o');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="ot_proc_g_o" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm" for="fecha">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm" for="procedimiento">Nombre Procedimiento</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="procedimiento" id="procedimiento"></textarea>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm" for="desc_procedimiento">Descripción Procedimiento</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="desc_procedimiento" id="desc_procedimiento"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button type="button" class="btn btn-info btn-sm btn-block">Añadir Procedimiento</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <hr>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <h5 <div class="media">
                                        <img class="align-self-start" src="" alt="">
                                        <div class="media-body">
                                            <h5 class="mb-0">Procedimientos</h5>

                                        </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="hormonales" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha Registro</th>
                                                <th class="text-center align-middle">Procedimiento</th>
                                                <th class="text-center align-middle">Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">12/05/2021</td>
                                                <td class="text-center align-middle">anulet</td>
                                                <td class="text-center align-middle">intradermico sin antecedentes ni incidentes</td>
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
    </div>
</div>
<script>
    function otros_proc() {
        $('#otros_proc_modal').modal('show');
    }
</script>
