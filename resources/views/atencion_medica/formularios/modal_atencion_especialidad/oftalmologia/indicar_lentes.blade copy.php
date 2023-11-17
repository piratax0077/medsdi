<div id="indicar_lente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_lente" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Receta de lentes</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form>
								<div class="form-row">
									<div class="col-md-3">
	                                    <label class="col-form-label font-weight-bolder text-c-blue">Tipo de lentes</label>
	                                </div>
	                                <div class="col-md-9">
										<select class="form-control form-control-sm" name="r_oi_tipo_lentes" id="r_oi_tipo_lentes">
											<option value="0" selected>Seleccione</option>
                                            <option value="1">Opticos monofocales</option>
                                            <option value="2">Opticos bifocales</option>
                                            <option value="3">Opticos trifocales</option>
                                            <option value="3">Progresivos</option>
                                            <option value="4">Opticos de sol</option>
                                            <option value="5">Contacto</option>
										</select>
	                                </div>
								</div>
							</form>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bolder text-c-blue">Recetas</label>
						</div>
					    <div class="col-md-9">
					        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
					            <li class="nav-item">
                                    <div class="btn btn-sm btn-info" onclick="activar_lente_para('cerca', '1');" id="btn_cerca" data-id="1"><label>Lentes de cerca</label></div>
					                <a class="nav-link-wizard active" id="lentes_cerca_tab" data-toggle="pill" href="#lentes_cerca" role="tab" aria-controls="lentes_cerca" aria-selected="true">Lentes de cerca</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="lentes_intermedio_tab" data-toggle="pill" href="#lentes_intermedio" role="tab" aria-controls="pills-home" aria-selected="true">Lentes intermedios</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="lentes_lejos_tab" data-toggle="pill" href="#lentes_lejos" role="tab" aria-controls="pills-home" aria-selected="true">Lentes ópticos</a>
					            </li>
					        </ul>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
					        <div class="tab-content" id="pills-tablas_examenes">
					        	<!--Lentes de cerca-->
					            <div class="tab-pane fade show active" id="lentes_cerca" role="tabpanel" aria-labelledby="lentes_cerca_tab">
					                <div class="row">
                                        {{-- izquierda --}}
					                	<div class="col-sm-6 col-md-6">
					                		<div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <h6 style="text-align: center;color:rgb(34, 40, 215)" >OJO IZQUIERDO</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Esfera</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_cerca_oi_esfera" id="r_cerca_oi_esfera">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected>N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Cilindro</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_cerca_oi_cilindro" id="r_cerca_oi_cilindro">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected>N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Valor eje</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_oi_valor_eje" id="r_cerca_oi_valor_eje">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">ADD</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_cerca_oi_add" id="r_cerca_oi_add">
                                                        <option value="0" selected>0</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+4"> +4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Prisma</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_oi_prisma" id="r_cerca_oi_prisma">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">DIP</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_oi_dip" id="r_cerca_oi_dip">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_oi_obs" id="r_cerca_oi_obs">
                                                </div>
                                            </div>
					                	</div>

                                        {{-- derecha --}}
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 style="text-align: center;color:rgb(205, 36, 36)" >OJO DERECHO</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Esfera</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_cerca_od_esfera" id="r_cerca_od_esfera">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="0" selected> N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Cilindro</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_cerca_od_cilindro" id="r_cerca_od_cilindro">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected> N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Valor eje</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_od_valor_eje" id="r_cerca_od_valor_eje">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">ADD</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_cerca_od_add" id="r_cerca_od_add">
                                                        <option value="0" selected>0</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+4"> +4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Prisma</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_od_prisma" id="r_cerca_od_prisma">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">DIP</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_od_dip" id="r_cerca_od_dip">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_cerca_od_obs" id="r_cerca_od_obs">
                                                </div>
                                            </div>
					                	</div>
					                </div>
					            </div>

					            <!--Lentes intermedios-->
					            <div class="tab-pane fade show" id="lentes_intermedio" role="tabpanel" aria-labelledby="lentes_intermedio_tab">
					                <div class="row">
					                	{{-- izquierda --}}
					                	<div class="col-sm-6 col-md-6">
					                		<div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <h6 style="text-align: center;color:rgb(34, 40, 215)" >OJO IZQUIERDO</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Esfera</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_interm_oi_esfera" id="r_interm_oi_esfera">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected>N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Cilindro</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_interm_oi_cilindro" id="r_interm_oi_cilindro">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected>N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Valor eje</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_oi_valor_eje" id="r_interm_oi_valor_eje">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">ADD</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_interm_oi_add" id="r_interm_oi_add">
                                                        <option value="0" selected>0</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+4"> +4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Prisma</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_oi_prisma" id="r_interm_oi_prisma">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">DIP</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_oi_dip" id="r_interm_oi_dip">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_oi_obs" id="r_interm_oi_obs">
                                                </div>
                                            </div>
					                	</div>

                                        {{-- derecha --}}
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 style="text-align: center;color:rgb(205, 36, 36)" >OJO DERECHO</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Esfera</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_interm_od_esfera" id="r_interm_od_esfera">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="0" selected> N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Cilindro</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_interm_od_cilindro" id="r_interm_od_cilindro">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected> N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Valor eje</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_od_valor_eje" id="r_interm_od_valor_eje">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">ADD</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_interm_od_add" id="r_interm_od_add">
                                                        <option value="0" selected>0</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+4"> +4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Prisma</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_od_prisma" id="r_interm_od_prisma">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">DIP</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_od_dip" id="r_interm_od_dip">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_interm_od_obs" id="r_interm_od_obs">
                                                </div>
                                            </div>
					                	</div>
					                </div>
					            </div>

					            <!--Lentes de lejos-->
					            <div class="tab-pane fade show " id="lentes_lejos" role="tabpanel" aria-labelledby="lentes_lejos_tab">
					             	<div class="row">
					                	{{-- izquierda --}}
					                	<div class="col-sm-6 col-md-6">
					                		<div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <h6 style="text-align: center;color:rgb(34, 40, 215)" >OJO IZQUIERDO</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Esfera</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_lejos_oi_esfera" id="r_lejos_oi_esfera">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected>N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Cilindro</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_lejos_oi_cilindro" id="r_lejos_oi_cilindro">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected>N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Valor eje</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_oi_valor_eje" id="r_lejos_oi_valor_eje">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">ADD</label>
                                                    <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_lejos_oi_add" id="r_lejos_oi_add">
                                                        <option value="0" selected>0</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+4"> +4</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Prisma</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_oi_prisma" id="r_lejos_oi_prisma">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">DIP</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_oi_dip" id="r_lejos_oi_dip">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_oi_obs" id="r_lejos_oi_obs">
                                                </div>
                                            </div>
					                	</div>

                                        {{-- derecha --}}
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <h6 style="text-align: center;color:rgb(205, 36, 36)" >OJO DERECHO</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Esfera</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_lejos_od_esfera" id="r_lejos_od_esfera">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="0" selected> N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Cilindro</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_lejos_od_cilindro" id="r_lejos_od_cilindro">
                                                        <option value="+4"> +4</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="0" selected> N</option>
                                                        <option value="-0.25"> -0.25</option>
                                                        <option value="-0.5"> -0.5</option>
                                                        <option value="-0.75"> -0.75</option>
                                                        <option value="-1"> -1</option>
                                                        <option value="-1.25"> -1.25</option>
                                                        <option value="-1.50"> -1.50</option>
                                                        <option value="-1.75"> -1.75</option>
                                                        <option value="-2"> -2</option>
                                                        <option value="-2.25"> -2.25</option>
                                                        <option value="-2.5"> -2.5</option>
                                                        <option value="-2.75"> -2.75</option>
                                                        <option value="-3"> -3</option>
                                                        <option value="-3.25"> -3.25</option>
                                                        <option value="-3.5"> -3.5</option>
                                                        <option value="-3.75"> -3.75</option>
                                                        <option value="-4"> -4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Valor eje</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_od_valor_eje" id="r_lejos_od_valor_eje">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">ADD</label>
                                                    <select class="form-control form-control-sm" style="color:red" name="r_lejos_od_add" id="r_lejos_od_add">
                                                        <option value="0" selected>0</option>
                                                        <option value="+0.25"> +0.25</option>
                                                        <option value="+0.5"> +0.5</option>
                                                        <option value="+0.75"> +0.75</option>
                                                        <option value="+1"> +1</option>
                                                        <option value="+1.25"> +1.25</option>
                                                        <option value="+1.50"> +1.50</option>
                                                        <option value="+1.75"> +1.75</option>
                                                        <option value="+2"> +2</option>
                                                        <option value="+2.25"> +2.25</option>
                                                        <option value="+2.5"> +2.5</option>
                                                        <option value="+2.75"> +2.75</option>
                                                        <option value="+3"> +3</option>
                                                        <option value="+3.25"> +3.25</option>
                                                        <option value="+3.5"> +3.5</option>
                                                        <option value="+3.75"> +3.75</option>
                                                        <option value="+4"> +4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Prisma</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_od_prisma" id="r_lejos_od_prisma">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">DIP</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_od_dip" id="r_lejos_od_dip">
                                                </div>

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <input type="text" class="form-control form-control-sm" name="r_lejos_od_obs" id="r_lejos_od_obs">
                                                </div>
                                            </div>
					                	</div>
					                </div>
					            </div>

					        </div>
					    </div>
					</div>
					<hr class="mt-1">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<form>
								<div class="form-group">
                                    <label class="floating-label">Comentarios General</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="r_obs" id="r_obs"></textarea>
                                </div>
							</form>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success btn-info btn-sm" onclick="guardar_receta_lentes();">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function guardar_receta_lentes()
    {
        id_ficha_atencion
        id_
    }
</script>

