<div id="inf_rehab_vest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="inf_rehab_vest" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Informe Rehabilitación Vestibular</h5>
                <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#inf_rehab_vest').modal('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <script>
                               var f = new Date();
                               document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <label class="floating-label-activo-sm" for='med_tte'>Médico Tratante</label>
                            <input type="text" class="form-control form-control-sm" name="med_tte" id="med_tte">
                        </div>
						<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 d-none">
                            <label class="floating-label-activo-sm" for='nombre_paciente'>Nombre del Paciente</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_paciente" id="nombre_paciente">
                        </div>
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3 d-none">
                            <label class="floating-label-activo-sm" for='edad'>Edad</label>
                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                        </div>
                        <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9 d-none">
                            <label class="floating-label-activo-sm" for='email'>Email</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for='dg_fono'>Diagnóstico</label>
                            <input type="text" class="form-control form-control-sm" name="dg" id="dg">
                        </div>
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="floating-label-activo-sm" for='ses_real'>Sesiones programadas</label>
                            <input type="text" class="form-control form-control-sm" name="ses_real" id="ses_real">
                        </div>
                        <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label class="floating-label-activo-sm" for='ses_pend'>Sesiones pendientes</label>
                            <input type="text" class="form-control form-control-sm" name="ses_pend" id="ses_pend">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Apreciación e interpretación de Tratamiento</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Fecha evaluación inicial</label>
                            <input type="date" class="form-control form-control-sm" name="eval_ini" id="eval_ini">
                        </div>

                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Fecha evaluación actuál</label>
                            <input type="date" class="form-control form-control-sm" name="eval_ini" id="eval_ini">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Test agudeza visual</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>

                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos Inicio</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos actuales</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Test apoyo monopodal</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>

                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos Inicio</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos actuales</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>

                    </div>

                     <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Test alcance funcional</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>

                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos Inicio</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos actuales</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>

                    </div>

                     <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Timed up and go</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>

                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos Inicio</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos actuales</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>

                    </div>

                     <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Test marcha dinámica DGI</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>

                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos Inicio</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos actuales</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>

                    </div>

                     <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h5 class="floating-left">Test discapacidad por mareo DHI</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-8 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>

                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos Inicio</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>
                         <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2 mt-2">
                            <label class="floating-label-activo-sm" for='tto_realizado'>Puntos actuales</label>
                            <input type="num" class="form-control form-control-sm" name="tto_realizado" id="tto_realizado">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <label class="floating-label-activo-sm" for='ses_pend'>Conclusión y apreciación del profesional</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-3">
                            <label class="floating-label-activo-sm" for='nomb_fono'>Nombre profesional tratante</label>
                            <input type="text" class="form-control form-control-sm" name="nomb_fono" id="nomb_fono">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                            <label class="floating-label-activo-sm" for='prox_cont_fono'>Próximo Control</label>
                            <input type="date" class="form-control form-control-sm" name="prox_cont_fono" id="prox_cont_fono">
                        </div>
                    </div>
                </form>
			</div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary-light-c btn-sm"><i class="feather icon-file"></i>Ver PDF</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#inf_rehab_vest').modal('hide')">Cerrar modal</button>
                    <button type="button" class="btn btn-info-light-c btn-sm" onclick="inf_rehab_vest();"><i class="feather icon-save"></i> Guardar</button>

                </div>
		</div>
	</div>
</div>
<script>
    function informeRehabilitacionVest() {
        $('#inf_rehab_vest').modal('show');
    }


</script>
