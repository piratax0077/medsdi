<div id="c_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_pass" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Cambiar contraseña</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Contraseña actual</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Contraseña nueva</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Repetir contraseña nueva</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    		<button type="button" class="btn btn-info">Guardar</button>
                    	</div>
                    </div>
                </form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function pass() {
        $('#c_pass').modal('show');
    }
</script>

