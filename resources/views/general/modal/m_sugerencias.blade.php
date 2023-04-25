<div id="fsugerencias" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="fsugerencias"" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->nombre }}" id="nombre_fc">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_uno }}" id="apellido_uno_profesional_fc">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_dos }}" id="apellido_dos_profesional_fc">  --}}


        @csrf
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Sugerencias al Software</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">profesional</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sugerencias" id="Prof_sugerencias">
			        </div>

					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Fecha</label>
			            <input type="text" class="form-control form-control-sm" name="Prof_sugerencias_fecha" id="Prof_sugerencias_fecha">
			        </div>

				</div>


                <div class="form-row">
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Sugerencias</label>
						<input type="text" class="form-control form-control-sm" id="form_sugerencias"name="form_sugerencias" value="">
					</div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Especialidad</label>
                        <input type="text" class="form-control form-control-sm" id="form_sugerencias_especialidad"name="form_sugerencias_especialidad" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_sugerencias" id="obs_sugerencias"></textarea>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Solicitar</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Cerrar</button>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

