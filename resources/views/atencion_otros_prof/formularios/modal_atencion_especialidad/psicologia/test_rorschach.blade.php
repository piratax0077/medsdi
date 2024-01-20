<div id="test_rorsch" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="test_rorsch" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">TEST DE RORSCHACH</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
					<div class="row">
					    <div class="col-md-12">
					        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
					            <li class="nav-item">
					                <a class="nav-link-wizard active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">LAM-1</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">LAM-2</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="tres_tab" data-toggle="pill" href="#tres" role="tab" aria-controls="pills-home" aria-selected="true">LAM-3</a>
					            </li>
								 <li class="nav-item">
					                <a class="nav-link-wizard " id="cuatro_tab" data-toggle="pill" href="#cuatro" role="tab" aria-controls="pills-home" aria-selected="true">LAM-4</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="cinco_tab" data-toggle="pill" href="#cinco" role="tab" aria-controls="pills-home" aria-selected="true">LAM-5</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="seis_tab" data-toggle="pill" href="#seis" role="tab" aria-controls="pills-home" aria-selected="true">LAM-6</a>
					            </li>
								 <li class="nav-item">
					                <a class="nav-link-wizard " id="siete_tab" data-toggle="pill" href="#siete" role="tab" aria-controls="pills-home" aria-selected="true">LAM-7</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="ocho_tab" data-toggle="pill" href="#ocho" role="tab" aria-controls="pills-home" aria-selected="true">LAM-8</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link-wizard" id="nueve_tab" data-toggle="pill" href="#nueve" role="tab" aria-controls="pills-home" aria-selected="true">LAM-9</a>
					            </li>
								<li class="nav-item">
					                <a class="nav-link-wizard" id="diez_tab" data-toggle="pill" href="#diez" role="tab" aria-controls="pills-home" aria-selected="true">LAM-10</a>
					            </li>
                                <li class="nav-item">
					                <a class="nav-link-wizard" id="c_gen_tab" data-toggle="pill" href="#c_gen" role="tab" aria-controls="pills-home" aria-selected="true">COMENTARIOS</a>
					            </li>
					        </ul>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
					        <div class="tab-content" id="pills-tablas_examenes">
					        	<!--TAB 1-->
					            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_1.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_uno_psi_resp_ro" id="lam_uno_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_uno_psi_coment_ro" id="lam_uno_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
					            <!--TAB 2-->
					            <div class="tab-pane fade show" id="dos" role="tabpanel" aria-labelledby="dos_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_2.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_dos_psi_resp_ro" id="lam_dos_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_dos_psi_coment_ro" id="lam_dos_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
					            <!--TAB 3-->
					            <div class="tab-pane fade show" id="tres" role="tabpanel" aria-labelledby="tres_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_3.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_tres_psi_resp_ro" id="lam_tres_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_tres_psi_coment_ro" id="lam_tres_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 4-->
					            <div class="tab-pane fade show" id="cuatro" role="tabpanel" aria-labelledby="cuatro_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_4.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_cuatro_psi_resp_ro" id="lam_cuatro_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_cuatro_psi_coment_ro" id="lam_cuatro_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 5-->
					            <div class="tab-pane fade show" id="cinco" role="tabpanel" aria-labelledby="cinco_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_5.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_cinco_psi_resp_ro" id="lam_cinco_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_cinco_psi_coment_ro" id="lam_cinco_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 6-->
					            <div class="tab-pane fade show" id="seis" role="tabpanel" aria-labelledby="seis_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_6.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_seis_psi_resp_ro" id="lam_seis_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_seis_psi_coment_ro" id="lam_seis_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 7-->
					            <div class="tab-pane fade show" id="siete" role="tabpanel" aria-labelledby="siete_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_7.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_siete_psi_resp_ro" id="lam_siete_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_siete_psi_coment_ro" id="lam_siete_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 8-->
					            <div class="tab-pane fade show" id="ocho" role="tabpanel" aria-labelledby="ocho_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_8.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_ocho_psi_resp_ro" id="lam_ocho_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_ocho_psi_coment_ro" id="lam_ocho_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 9-->
					            <div class="tab-pane fade show" id="nueve" role="tabpanel" aria-labelledby="nueve_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_9.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_nueve_psi_resp_ro" id="lam_nueve_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_nueve_psi_coment_ro" id="lam_nueve_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
								<!--TAB 10-->
					            <div class="tab-pane fade show" id="diez" role="tabpanel" aria-labelledby="diez_tab">
									<div class="form-row" >
										<div class="col-sm-12 mt-2" >
											<div class="form-group fill">
                                                <img src="{{ asset('images\psico\lam_10.png') }}" style="width:100%">
											</div>
										</div>
									</div>
                                    <div class="form-row">
                                        <div class="col-sm-3 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Respuesta</label>
                                            <input type="text" class="form-control form-control-sm" name="lam_diez_psi_resp_ro" id="lam_diez_psi_resp_ro">
                                        </div>
                                        <div class="col-sm-9 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="lam_diez_psi_coment_ro" id="lam_diez_psi_coment_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
                                <!--TAB 10-->
					            <div class="tab-pane fade show" id="c_gen" role="tabpanel" aria-labelledby="c_gen_tab">
									<div class="form-row">
                                        <div class="col-sm-12 mt-2">
                                            <label id="" name="" class="floating-label-activo-sm">Comentarios Generales del test</label>
                                            <textarea class="form-control form-control-sm" rows="20" onfocus="this.rows=20" onblur="this.rows=20;" name="comentarios_gen_ro" id="comentarios_gen_ro"></textarea>
                                        </div>
                                        <br>
                                    </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>
</div>
