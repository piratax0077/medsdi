<div id="liquidacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liquidacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Liquidaci&oacute;n Centro M&eacute;dico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="number" class="form-control form-control-sm" name="rut_prof" id="rut_prof">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Liquidaci&oacute;n</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_liq" id="fecha_liq">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Atenciones</label>
                                <input class="form-control form-control-sm" name="n_atenc" id="n_atenc" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Descuentos</label>
                                <input class="form-control form-control-sm" name="desc" id="desc" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje</label>
                                <input class="form-control form-control-sm" name="porc" id="porc" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Total</label>
                                <input class="form-control form-control-sm" name="total_pago" id="total_pago" type="text" >
                            </div>
                        </div>
                    </div>
                <form>
                <div class="col-sm-12 mt-3">
                    <!--Tabla-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Mes</th>
                                    <th class="text-center align-middle">N&deg; Atenciones</th>
                                    <th class="text-center align-middle">&#37;</th>
                                    <th class="text-center align-middle">Descuentos</th>
                                    <th class="text-center align-middle">A Pagar</th>
                                    <th class="text-center align-middle">ver PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle"><span>03/12/20</span></td>
                                    <td class="text-center align-middle">Noviembre</td>
                                    <td class="text-center align-middle">120</td>
                                    <td class="text-center align-middle"><span>30</span></td>
                                    <td class="text-center align-middle">35000</td>
                                    <td class="text-center align-middle">1165000</td>
                                    <td class="text-center align-middle">
                                    <button class="btn btn-danger btn-sm btn-info"><i class="feather icon-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!--Cierre Tabla-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="correo-contador" checked="">
                            <label for="correo-contador" class="cr"></label>
                        </div>
                        <label>Notificar por correo electr&oacute;nico</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>