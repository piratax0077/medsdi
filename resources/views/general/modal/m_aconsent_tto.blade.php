<div id="m_aconsentcirm" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsentcirm" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Consentimiento informado </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <table class="display table table-striped table-hover dt-responsive datatable" style="width:100%" id="m_aconsentcirm_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sol. por</th>
                                    <th>Consentimiento</th>
                                    <th>Diagnostigo</th>
                                    <th>Cirugia</th>
                                    <th>F. Creación</th>
                                    <th>F. Aprobación</th>
                                    <th>Estado</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <input type="hidden" name="id_consentimiento" id="id_consentimiento" value="">
                <hr>
                <div class="form-row">
					<div class="form-group fill col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Diagnóstico</label>
						<input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_hipotesis,descripcion_hipotesis" id="diagnostico_cons" name="diagnostico_cons" value="" onchange="validarDiagnostico('diagnostico_cons','consentimiento');cargarIgual('diagnostico_cons');" >
					</div>
                    <div class="form-group fill col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Cirugía o Procedimiento</label>
						<input type="text" class="form-control form-control-sm" id="cirugia_cons" name="cirugia_cons" value="">
					</div>
                    <div class="form-group fill col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<label class="floating-label-activo-sm">Nombre del consentimiento</label>
						<input  type="text" class="form-control form-control-sm" id="consentimiento" name="consentimiento" value="">
						<input  type="hidden" id="id_consentimiento" name="id_consentimiento" value="">
                        <span style="color:red; font-size: 10px" id="msj_consentimiento"></span>
					</div>
				</div>


                <div id="div_informacion_pasos_cons">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Verifique el Diagnóstico, llene Cirugía a realizar y busque el Consentimiento Informado.</h6>
                        </div>
                    </div>
                </div>
                <div id="div_informacion_general_cons" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-12">
                            <p>1. He consultado con el profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong> quien me ha explicado e informado,sobre el motivo, los objetivos y potenciales riesgos para mi salud , que este procedimiento conlleva.</p>
                        </div>
                    </div>
                    <div class="row" id='m_aconsentcirm_contenido'>
                        {{-- texto de consentimiento  --}}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Situaciones especiales del paciente</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="situaciones_especiales_del_paciente" id="situaciones_especiales_del_paciente"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="esperando_aprobacion" id="esperando_aprobacion" value="0">

                    <div class="form-row" id="div_btn_aprobacion_solicitud" style="display:;">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="registar_solicitar_autorizacion_cons();">Solicitar autorización</button>
                        </div>
                    </div>

                    <div class="form-row" id="div_btn_aprobacion_espera" style="display: none;">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary mt-1 mb-3" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" id="div_btn_aprobacion_ok" style="display: none;">
                        <div class="form-group col-sm-6">
                            <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_ver_pdf_cons_activa">Ver PDF</button>
                        </div>

                        <div class="form-group col-sm-6">
                            <button type="button" class="btn btn-success btn-sm btn-block">Enviar</button>
                        </div>

                        <div class="form-group col-sm-12">
                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="limpiar_consentimiento_informado()">Crear nuevo Consentimiento</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>2. Al autorizar mediante email o por la app.,Me doy por informado y doy mi consentimiento para el procedimiento enunciado precedentemente</p>
                        </div>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

