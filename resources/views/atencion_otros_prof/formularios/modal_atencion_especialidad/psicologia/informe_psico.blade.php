<div id="informe_psi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_psi" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">INFORME SICOLÓGICO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="card" href="#"><!--Inicio de Card-->
				    <div class="card-body shadow-none" id="form_0_orl">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <script>
                                    var f = new Date();
                                    document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                </script>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="floating-label">Médico Tratante</label>
                                <input type="text" class="form-control form-control-sm" name="psi_infor_med_tte" id="psi_infor_med_tte">
                            </div>
                            {{--  <div class="form-group col-md-6">
                                <label class="floating-label">Nombre del Paciente</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Edad</label>
                                <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Email</label>
                                <input type="text" class="form-control form-control-sm" name="email" id="email">
                            </div>  --}}

                            <div class="form-group col-md-4">
                                <label class="floating-label">Diagnóstico Sicológico</label>
                                <input type="text" class="form-control form-control-sm" name="psi_dg_sico" id="psi_dg_sico">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label">N° Sesiones</label>
                                <input type="text" class="form-control form-control-sm" name="psi_ses_real" id="psi_ses_real">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">sesiones Pendientes</label>
                                <input type="text" class="form-control form-control-sm" name="psi_ses_pend" id="psi_ses_pend">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label">Tratamiento Realizado</label>
                                <input type="text" class="form-control form-control-sm" name="psi_tto_realizado" id="psi_tto_realizado">
                            </div>
                            <div class="form-group col-md-8">
                                <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="psi_infor_coment" id="psi_infor_coment"></textarea>
                            </div>
                            {{--  <div class="form-group col-md-8">
                                <label class="floating-label">Nombre Sicólogo</label>
                                <input type="text" class="form-control form-control-sm" name="nomb_fono" id="nomb_fono">
                            </div>  --}}
                            <div class="form-group col-md-4">
                                <label class="floating-label-activo-sm">Proximo Control</label>
                                <input type="date" class="form-control form-control-sm" name="psi_prox_cont" id="psi_prox_cont">
                            </div>
                        </div>
                    </div>
                </div>


				<div class="modal-footer">
                    <button type="button" class="btn btn-secondary has-ripple" data-dismiss="modal">Ver PDF</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function informe_psi() {
        $('#informe_psi').modal('show');
    }
</script>
