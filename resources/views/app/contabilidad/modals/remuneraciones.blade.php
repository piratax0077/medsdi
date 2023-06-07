<div id="m_remuneraciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_remuneraciones" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Remuneraciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
					<div class="row">
					    <div class="col-md-12">
					        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
					            <li class="nav-item">
					                <a class="nav-link-modal active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Haberes</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-modal" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">Descuentos</a>
					            </li>
					           <li class="nav-item">
					                <a class="nav-link-modal" id="tres_tab" data-toggle="pill" href="#tres" role="tab" aria-controls="pills-home" aria-selected="true">Resumen</a>
					            </li>
					        </ul>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
					        <div class="tab-content" id="pills-tablas_examenes">
					            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
					                <div class="row">
					                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					                		<h5 class="text-c-blue">HABERES</h5>
					                		<hr class="mt-0">
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<h6 class="text-c-blue"> Haberes imponibles</h6>
					                	</div>
					                	<div class="col-sm-12 col-md-12 mb-3">
					                		<div class="table-responsive">
											    <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
											        <tbody>
											        	<tr>
											                <th class="align-middle">Sueldo base</th>
											                <th class="align-middle"> <input type="number" class="form-control form-control-sm" name="r_sueldo_base" id="sr_ueldo_base" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Bonos</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_bonos" id="r_bonos" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Horas extra</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_horas_extra" id="r_horas_extra" value=""></th>
											            </tr>
											        </tbody>
											        <tfoot class="bg-tfoot-primary-claro">
											            <tr>
											                <th class="align-middle">Total Haberes Imponibles</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_total_h_imponbles" id="r_total_h_imponbles" value="" readonly></th>
											            </tr>
											        </tfoot>
											    </table>
											</div>
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<h6 class="text-c-blue"> Haberes NO Imponibles</h6>
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<div class="table-responsive">
											    <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
											        <tbody>
											        	<tr>
											                <th class="align-middle">Asignación colación</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_colacion" id="r_colacion" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Asignación movilización</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_movilizacion" id="r_movilizacion" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Asignación familiar</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_asignacion_fam" id="r_asignacion_fam" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">ETC..</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_otros" id="r_otros" value=""></th>
											            </tr>
											        </tbody>
											        <tfoot class="bg-tfoot-primary-claro">
											            <tr>
											                <th class="align-middle">Total Haberes No Imponibles</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_total_no_imponibles" id="r_total_no_imponibles" value=""readonly></th>
											            </tr>
											        </tfoot>
											    </table>
											</div>
					                	</div>
					                	<div class="col-sm-12 col-md-12 text-center">
					                		<div class="alert alert-primary pb-0" role="alert">
  												<h5 class="f-18 text-c-blue"> Total Haberes</h5><h5 class="f-16 text-c-blue"><input type="number" class="form-control form-control-sm" name="r_total_haberes" id="r_total_haberes" value=""readonly></th>
											</div>
					                	</div>
					                </div>
					            </div>
					            <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos_tab">
					                <div class="row">
					                	<div class="col-sm-12 col-md-12">
					                		<h5 class="text-c-blue">DESCUENTOS</h5>
					                		<hr class="mt-0">
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<h6 class="text-c-blue">Descuentos legales</h6>
					                	</div>
					                	<div class="col-sm-12 col-md-12 mb-3">
					                		<div class="table-responsive">
											    <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
											        <tbody>
											        	<tr>
											                <th class="align-middle">Cotiazción AFP </th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_afp" id="r_afp" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Cotiazción Voluntatia AFP</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_afp:vol" id="r_afp:vol" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Seguro de Cesantia</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_seg_cesantia" id="r_seg_cesantia" value=""></th>
											            </tr>
											        </tbody>
											    </table>
											</div>
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<h6 class="text-c-blue"> Descuentos personales</h6>
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<div class="table-responsive">
											    <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
											        <tbody>
											        	<tr>
											                <th class="align-middle">Prestamos</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_prestamos" id="r_prestamos" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Anticipos</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_anticipos" id="r_anticipos" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">Ahorro voluntario</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_ahoro_vol" id="r_ahoro_vol" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">ETC..</th>
											                <th class="align-middle">$00000</th>
											            </tr>
											        </tbody>
											    </table>
											</div>
					                	</div>
					                	<div class="col-sm-12 col-md-12 text-center">
					                		<div class="alert alert-primary pb-0" role="alert">
  												<h5 class="text-c-blue f-18"> TOTAL DESCUENTOS</h5><input type="number" class="form-control form-control-sm" name="r_total_desc" id="r_total_desc" value="">
											</div>
					                	</div>
					                </div>
					            </div>
					            <div class="tab-pane fade" id="tres" role="tabpanel" aria-labelledby="tres_tab">
                                    <div class="row">
					                	<div class="col-sm-12 col-md-12">
					                		<h5 class="text-c-blue">LIQUIDACIÓN FINAL</h5>
					                		<hr class="mt-0">
					                	</div>
					                	<div class="col-sm-12 col-md-12">
					                		<h6 class="text-c-blue">TOTAL HABERES</h6>
					                	</div>
					                	<div class="col-sm-12 col-md-12 mb-3">
					                		<div class="table-responsive">
											    <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
											        <tbody>
											        	<tr>
											                <th class="align-middle">TOTAL HABERES</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_afp" id="r_afp" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">TOTAL DESCUENTOS</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_afp:vol" id="r_afp:vol" value=""></th>
											            </tr>
											            <tr>
											                <th class="align-middle">VALOR A PAGAR</th>
											                <th class="align-middle"><input type="number" class="form-control form-control-sm" name="r_seg_cesantia" id="r_seg_cesantia" value=""></th>
											            </tr>
											        </tbody>
											    </table>
											</div>
					                	</div>
					                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                                        <button type="submit" class="btn btn-success btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
                                        <button type="button" class="btn btn-primary btn-sm" style="color: #3268bf;background-color: #cde0f6;border-color: #cde0f6;"><i class="feather icon-file"></i>Generar PDF</button>
                                    </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script>
		function pago_sueldo() {
        $('#m_remuneraciones').modal('show');
        }
	</script>
