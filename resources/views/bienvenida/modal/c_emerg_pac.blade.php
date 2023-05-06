<div id="c_emerg_pac" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_emerg_pac" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Contacto de emergencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Nombres</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Primer apellido</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Segundo apellido</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Fecha nacimiento</label>
                            <input type="date" class="form-control form-control-sm" name="nacimiento" id="nacimiento">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm">Nº</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Región</label>
                            <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Comuna</label>
                            <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Parentezco</label>
                            <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Prioridad</label>
                            <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    	<button type="button" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function sos() {
        $('#c_emerg_pac').modal('show');
    }
</script>
