<div id="m_lic_autor_compin" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_lic_autor_compin" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">  --}}
        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
        <input type="hidden" name="email_paciente_fc" value="{{ $paciente->email }}" id="email_paciente_fc">
        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->nombre }}" id="apellido_uno_profesional_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_uno }}" id="apellido_uno_profesional_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_dos }}" id="apellido_uno_profesional_fc">
        @csrf
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Solicita autorización a Compin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
			            <label class="floating-label">Rut</label>
			            <input type="text" class="form-control form-control-sm" name="rut_pcte_lic" id="rut_pcte_lic" value="">
			        </div>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label">Nombre del paciente</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte_lic" id="nom_pcte_lic" value="">
			        </div>
					<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
			            <label class="floating-label">Previsión</label>
			            <input type="text" class="form-control form-control-sm" name="lic_prev_pcte" id="lic_prev_pcte" value="">
			        </div>
				</div>
                <div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
			            <label class="floating-label">Rut profesional</label>
			            <input type="text" class="form-control form-control-sm" name="rut_prof_lic" id="rut_prof_lic" value="">
			        </div>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label">Nombre del profesional</label>
			            <input type="text" class="form-control form-control-sm" name="nom_prof_lic" id="nom_prof_lic" value="">
			        </div>
					<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
			            <label class="floating-label">Lugar atencion</label>
			            <input type="text" class="form-control form-control-sm" name="lugar_atenc_lic" id="lugar_atenc_lic" value="">
			        </div>
				</div>
				<div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="#">Empleadores informados</h6>
                    </div>
                </div>
                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>Estimado paciente.<strong style="text-transform:uppercase"> {{ $paciente->rut }}  </strong>.</p>
                        <p>S.D.I Le solicita a usted: Confirmar mediante su aplicación la autorización a COMPIN ,para notificar por email,app o celular, la resolución dela licencia y acceder a sus datos previsionales de acuerdo al articulo 10 de la ley 19.628 de la república de Chile.</p>
                    </div>
                </div>
                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>En espera de respuesta.</p>
					</div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Continuar</button>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

