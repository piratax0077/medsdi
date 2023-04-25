<div id="m_lic_empleador" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_lic_empleador" aria-hidden="true">
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
				<h5 class="modal-title text-white text-center">Empleadores informados</h5>
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
			            <label class="floating-label">Prevision</label>
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
			            <label class="floating-label">lugar Atencion</label>
			            <input type="text" class="form-control form-control-sm" name="lugar_atenc_lic" id="lugar_atenc_lic" value="">
			        </div>
				</div>
				<div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h5 class="#">Empleadores Informados</h5>
                    </div>
                </div>
                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p >Estimado profesional.<strong style="text-transform:uppercase"> {{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>.</p>
                        <p>S.D.I Le solicita a usted: Confirmar él o los empleadores informados,ya que si la información no es correcta.la licencia no podrá ser tramitada correctamente, impidiendo la evaluación y pago por parte de la entidad pagadora.</p>
                        <p>El trabajador informó a los siguientes empleadores:</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <div class="form-group ml-2">
                            <label class="form-group ml-3" >EMPRESA DE TRABAJO UNO perico de los palotes</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="custom-control custom-switch">
	                        <input type="checkbox" class="custom-control-input" id="tipo_licencia_des_emp">
	                        <label class="custom-control-label" for="tipo_licencia_des_emp">Desacociar</label>
	                    </div>
                    </div>
                </div>

                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">

                </div>

                <div class="form-row">
					<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>Estimado profesional.<strong style="text-transform:uppercase">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>¿VERIFICÓ CON EL PACIENTE?.</p>
					</div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Continuar</button>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

