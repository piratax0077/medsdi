<div id="c_perfil_prof" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_peso" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Perfil académico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Tipo antecedente académico</label>
                            <select class="form-control form-control-sm" name="id_tipo_antecedente_academico" id="id_tipo_antecedente_academico">
                                <option value="0">Seleccionar</option>
                                <option value="1">Titulo profesional </option>
                                <option value="2">Especialidad </option>
                                <option value="3">Subespecialidad </option>
                                <option value="4">Otros </option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Profesión</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Universidad</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Año de Titulo</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Ciudad y País</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">N° SUPERSALUD</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">N° colegio profesional</label>
                            <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
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

<script>
    function perfil() {
        $('#c_perfil_prof').modal('show');
    }
</script>
