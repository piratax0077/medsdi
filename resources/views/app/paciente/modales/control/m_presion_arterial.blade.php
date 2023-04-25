<div id="c_presion_arterial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_presion_arterial" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Control presión arterial</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">Fecha</label>
				        <input type="date" class="form-control form-control-sm" name="c_glicemia_fecha" id="c_glicemia_fecha"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">Hora</label>
				        <input type="time" class="form-control form-control-sm" name="c_glicemia_hora" id="c_glicemia_hora"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">Sistólica</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_sistolica" id="c_glicemia_sistolica"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">Diastólica</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_diastólica" id="c_glicemia_diastólica"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
				        <label class="floating-label-activo">Pulso</label>
				        <input type="text" class="form-control form-control-sm" name="c_glicemia_pulso" id="c_glicemia_pulso"></input>
				    </div>
				    <div class="form-group col-sm-12 col-md-6">
				        <label class="floating-label-activo">Comentarios</label>
				        <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="c_glicemia-coment" id="c_glicemia-coment"></textarea>
				    </div>
				    <div class="form-group col-sm-12 col-md-3">
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
						            <th>Hora</th>
						            <th>Sistólica</th>
						            <th>Peso<br> actual</th>
						            <th>Diastólica</th>
						            <th>Pulso</th>
						            <th>Comentarios</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>00/00/0000</td>
						            <td>11:11</td>
						            <td>120</td>
						            <td>80</td>
						            <td>2</td>
						            <td>68</td>
						            <td>Comentarios</td>
						        </tr>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

	