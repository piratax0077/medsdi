<div id="c_peso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_peso" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Control peso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Fecha</label>
				        <input type="date" class="form-control form-control-sm" name="c_glicemia_fecha" id="c_glicemia_fecha"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-2">
				        <label class="floating-label-activo">Sexo</label>
				        <select class="form-control form-control-sm" name="c_glicemia_sistolica">
					        <option>F</option>
					        <option>M</option>
				        </select>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Peso inicial</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_sistolica" id="c_glicemia_sistolica"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Peso actual</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_diastólica" id="c_glicemia_diastólica"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Estatura</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_diastólica" id="c_glicemia_diastólica"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <button class="btn btn-sm btn-block btn-primary">Calcular</button>
				    </div>
				     <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">IMC</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_pulso" id="c_glicemia_pulso"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Variación</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_pulso" id="c_glicemia_pulso"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-2">
				        <label class="floating-label-activo">Peso ideal</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_pulso" id="c_glicemia_pulso"></input>
				    </div>

				    <div class="form-group col-sm-12 col-md-6">
				        <button class="btn btn-sm btn-block btn-primary">Agregar</button>
				    </div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<h6 class="text-c-blue"> REGISTRO DE CONTROLES</h6>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<table id="reg-c-glic" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
						    <thead>
						        <tr>
						            <th>Fecha</th>
						            <th>Sexo</th>
						            <th>Peso<br> inicial</th>
						            <th>Peso<br> actual</th>
						            <th>Variación</th>
						            <th>Estatura</th>
						            <th>IMC</th>
						            <th>Peso ideal</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>00/00/0000</td>
						            <td>F</td>
						            <td>89</td>
						            <td>86</td>
						            <td>2</td>
						            <td>1,69</td>
						            <td>31,2 <span class="badge badge-pill badge-danger">Obesidad</span> </td>
						            <td>55 a 74kg</td>
						        </tr>
						        <tr>
						            <td>00/00/0000</td>
						            <td>F</td>
						            <td>89</td>
						            <td>86</td>
						            <td>2</td>
						            <td>1,69</td>
						            <td>31,2 <span class="badge badge-pill badge-warning">Sobrepeso</span></td>
						            <td>55 a 74kg</td>
						        </tr>
						        <tr>
						            <td>00/00/0000</td>
						            <td>F</td>
						            <td>89</td>
						            <td>86</td>
						            <td>2</td>
						            <td>1,69</td>
						            <td>25,1 <span class="badge badge-pill badge-success">Normal</span></td>
						            <td>55 a 74kg</td>
						        <tr>
						            <td>00/00/0000</td>
						            <td>F</td>
						            <td>89</td>
						            <td>86</td>
						            <td>2</td>
						            <td>1,69</td>
						            <td>11,2 <span class="badge badge-pill badge-secondary">Bajo peso</span></td>
						            <td>55 a 74kg</td>
						        </tr>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

	