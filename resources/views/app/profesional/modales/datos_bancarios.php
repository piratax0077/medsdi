<div id="cta_banco_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info_academica" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Datos Bancarios</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Rut</label>
                        <input type="text" class="form-control form-control-sm" name="liquidacion_rut" id="liquidacion_rut" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Nombre del Titular</label>
                        <input type="text" class="form-control form-control-sm" name="liquidacion_nombre" id="liquidacion_nombre" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Banco</label>
                        <select class="form-control form-control-sm" name="liquidacion_banco" id="liquidacion_banco">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Nº Cuenta</label>
                        <input type="text" class="form-control form-control-sm" name="liquidacion_nombre" id="liquidacion_nombre" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Tipo de cuenta</label>
                        <select class="form-control form-control-sm" name="liquidacion_tipo_cuenta" id="liquidacion_tipo_cuenta">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="col-sm-4 col-form-label font-weight-bolder ml-0">Principal</label>
                        <div class="col-sm-8 switch switch-success d-inline ">
                            <input type="checkbox" id="liquidacion_principal" name="liquidacion_principal" value="">
                            <label for="liquidacion_principal" class="cr"></label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-danger-light-c mr-2" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="button" class="btn btn-sm btn-info-light-c"><i class="feather icon-plus"></i> Añadir</button>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

