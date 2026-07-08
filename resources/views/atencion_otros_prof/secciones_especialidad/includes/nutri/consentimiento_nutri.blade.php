<div id="m_aconsent_nutri" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsent_nutri" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Consentimiento informado para tratamiento nutricional </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row"hidden>
					<div class="form-group col-sm-3">
			            <label class="floating-label">Rut</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte" id="rut">
			        </div>
					<div class="form-group col-sm-5">
			            <label class="floating-label">Nombre del paciente</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte" id="nom_pcte">
			        </div>
					<div class="form-group col-sm-2">
			            <label class="floating-label">Edad</label>
			            <input type="text" class="form-control form-control-sm" name="edad_pcte" id="edad_pcte">
			        </div>
                    <div class="form-group col-sm-2">
			            <label class="floating-label">N°</label>
			            <input type="text" class="form-control form-control-sm" name="edad_pcte" id="edad_pcte">
			        </div>
				</div>
                <!--Formulario / Menor de edad-->

                <!--Cierre: Formulario / Menor de edad-->
				<h6 class="mb-2" hidden>Paciente menor de edad o imposibilitado/a</h6>
				<div class="form-row">
                    @include('atencion_medica.generales.seccion_menor')
				</div>
				<div class="form-row" hidden>
					<div class="form-group col-sm-6">
						<label class="floating-label">Nombre del profesional</label>
						<input type="text" class="form-control form-control-sm" id="prof"name="prof" value="{{ $profesional->apellido_uno }}">
					</div>
				</div>
                <div class="form-row">
					<div class="form-group col-sm-4">
						<label class="floating-label">Diagnóstico</label>
						<input type="text" class="form-control form-control-sm" id="diagnostico_pre"name="diagnostico_pre" value="">
					</div>
                    <div class="form-group col-sm-4">
						<label class="floating-label">Tratamiento</label>
						<input type="text" class="form-control form-control-sm" id="cirugia"name="cirugia" value="">
					</div>
                    <div class="form-group col-sm-4">
						<label class="floating-label">Nombre del Consentimiento</label>
						<input  type="text" class="form-control form-control-sm" id="consentimiento"name="consentimiento" value="tratamiento nutricional">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<p>Yo, <strong>{{ $paciente->nombres}} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</strong> , doy mi consentimiento para participar en el programa de asesoramiento nutricional ofrecido por el profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>.
                        Entiendo que el programa incluye una evaluación nutricional, un plan de alimentación personalizado y seguimiento para ayudarme a alcanzar mis objetivos de salud. Se me ha explicado que este plan puede incluir cambios en mi dieta, patrones de alimentación y hábitos de ejercicio. También se me ha informado sobre los posibles beneficios y riesgos asociados con este plan. Estoy de acuerdo con este plan y estoy dispuesto a seguirlo de acuerdo con mis posibilidades y circunstancias. Entiendo que puedo revocar mi consentimiento en cualquier momento.
                        </p>
                          <p>
                        Se me ha indicado la necesidad de advertir de mis posibles alergias medicamentosas, alteraciones de la coagulación, existencia de prótesis, marcapasos, medicaciones actuales o cualquier otra circunstancia.
                        </p>
                          <p>Satisfecho con la información que se me ha entregado::</p>
                          <p class="p_ley"> CONSIENTO que se me realice este Tratamiento.</p>
                               
                            
					</div>
				</div>
				<hr>
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label class="floating-label-activo-sm">Situaciones especiales del paciente</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="situaciones Especiales del paciente" id="situaciones Especiales del paciente"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <button type="button" class="btn btn-danger btn-sm btn-block">Ver PDF</button>
                    </div>
                    <div class="form-group col-sm-4">
                        <button type="button" class="btn btn-info btn-sm btn-block">Solicitar autorización</button>
                    </div>
                    <div class="form-group col-sm-4">
                        <button type="button" class="btn btn-info btn-sm btn-block">Enviar</button>
                    </div>
                </div>
				<div class="form-row">
					<div class="col-md-12">
						<p>2. Al autorizar mediante email o por la app.,Me doy por informado y doy mi consentimiento para el procedimiento enunciado precedentemente</p>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>
<script>
   function conset_ttonutri() {
            $('#m_aconsent_nutri').modal('show');
        }
        
</script>
