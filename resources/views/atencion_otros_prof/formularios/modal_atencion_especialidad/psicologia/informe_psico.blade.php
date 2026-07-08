<div id="informe_psi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="informe_psi" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Informe psicológico</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				 <form>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <h6 class="tit-gen">
                                        <script>
                                           var f = new Date();
                                           document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                                        </script>
                                    </h6>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="floating-label-activo-sm">Procedencia del Paciente</label>
                                    <input type="text" class="form-control form-control-sm" name="proc_pcte" id="proc_pcte" value="">
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Diagnóstico</label>
                                    <input type="text" class="form-control form-control-sm" name="dg_psico" id="dg_psico">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Sesiones Realizadas</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="floating-label-activo-sm">Sesiones Pendientes</label>
                                    <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm">Tratamiento Realizado</label>
                                    <input type="text" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                                </div>
                                <div class="form-group col-sm-12 col-md-12 mb-2">
                                    <label id="" name="" class="floating-label-activo-sm">Informe</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                    <!-- Botón para grabar voz -->
                                    <button type="button" class="btn btn-outline-primary btn-sm mt-1 mb-3" id="btnGrabarvoz">
                                        🎤 Dictar descripción
                                    </button>
                                    <span id="estado_voz_voz" class="text-muted ml-2"></span>
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="floating-label-activo-sm">Nombre Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_sico" id="nombre_sico" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Próximo Control</label>
                                    <input type="date" class="form-control form-control-sm" name="prox_cont_sico" id="prox_cont_sico">
                                </div>
                            </div>
                        </form>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm"><i class="feather icon-file-text"></i>  Ver PDF</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>  Cerrar</button>
                <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
		</div>
	</div>
</div>
<script>
    function informe_psi() {
        $('#informe_psi').modal('show');
    }
</script>
