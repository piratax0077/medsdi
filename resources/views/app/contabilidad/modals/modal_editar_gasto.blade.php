<div id="editar_gasto_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_gasto_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar gasto Institucional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de gasto</label>
                                        <select class="form-control form-control-sm" id="tipo_gasto_inst" name="tipo_gasto_inst">
                                            <option value="0" data-select2-id="0">Seleccione</option>
                                            <option value="1"> Mensual</option>
                                            <option value="2"> Semestral</option>
                                            <option value="3"> Anual</option>
                                            <option value="4"> Esporádico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input class="form-control form-control-sm" type="text" id="nombre_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Vencimiento</label>
                                        <input class="form-control form-control-sm" type="text" id="vencimiento_gasto_inst">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Emisor</label>
                                        <input class="form-control form-control-sm" type="text" id="emisor_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Folio</label>
                                        <input class="form-control form-control-sm" type="text" id="folio_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Cuenta Contabilidad</label>
                                        <select class="form-control form-control-sm" id="grupo_gasto_inst" name="grupo_gasto_inst">
                                            <option value="0" data-select2-id="0">Seleccione</option>
                                            <option value="1"> Generales</option>
                                            <option value="2"> Gastos Comunes</option>
                                            <option value="3"> G. Operativos</option>
                                            <option value="4"> Otros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Mes de pago</label>
                                        <input class="form-control form-control-sm" type="text" id="mes_de_pago_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Modo de pago</label>
                                        <input class="form-control form-control-sm" type="text" id="modo_pago_gasto_inst">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Monto a pagar</label>
                                        <input class="form-control form-control-sm" type="text" id="monto_gasto_inst">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-sm-12 col-md-12">
                    <div class="form-row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger-light btn-sm btn-block" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary-light btn-sm btn-block" >Guardar Edición Gasto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
/*-Gastos-*/
<script>
    function editar_gasto() {
        $('#editar_gasto_cm').modal('show');
    }
</script>
